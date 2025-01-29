( function ( wp ) {

	var { __, sprintf } = wp.i18n;

	/**
	 * Monitor changes in the editor to check for the main tag
	 */
	function monitorEditorChanges() {
		let prevPostType = null;
		let prevPostId = null;

		const unsubscribe = wp.data.subscribe( () => {
			// Get the current post type and post ID for comparison
			const currentPostType = wp.data.select( 'core/editor' ).getCurrentPostType();
			const currentPostId = wp.data.select( 'core/editor' ).getCurrentPostId();

			// Run this code only if the post type or post ID has changed
			if (
				currentPostType !== prevPostType ||
				currentPostId !== prevPostId
			) {
				// Set the previous post type and post ID to the current values for the next check
				prevPostType = currentPostType; // Can be wp_template, wp_template_part, etc.
				prevPostId = currentPostId; // Is not an ID, but in the form of theme-name//template-name, e. g. greyd-wp//home

				wp.data.subscribe( () => {
					// Every change in the 'core/block-editor' state passes through here
					// Check if the editor is ready, so we can get the current post type, as it's not immediately available
					const isEditorReady = wp.data.select( 'core/editor' ).__unstableIsEditorReady();

					if ( isEditorReady ) {
						let currentPostType = wp.data.select( 'core/editor' ).getCurrentPostType();

						// Make sure we only check against the wp_template post type
						if ( 'wp_template' === currentPostType ) {
							// Get the content of this template
							const blocks = wp.data.select( 'core/editor' ).getEditorBlocks();

							// Call a recursive function to find all occurrences of the main tag
							const mainTagCount = checkMainTag( blocks, 0 );

							if ( 1 === mainTagCount ) {
								// If only one main tag is found, it's accessible so we can return here
								// But before returning, let's check if the notice is already there
								const notice = wp.data.select( 'core/notices' ).getNotices().find( ( notice ) => notice.id === 'greyd-a11y-main-notice' );
								// If so, remove it, because it means that the user has fixed the issue
								// This happens on saving the template, not just by updating the block
								if ( notice ) {
									wp.data.dispatch( 'core/notices' ).removeNotice( 'greyd-a11y-main-notice' );
								}
								return;
							} else if ( 0 === mainTagCount || 1 < mainTagCount ) {
								// If there's no main tag, or more than one main tag, we need to create a warning notice
								// The mainTagCount gets passed to the function to determine the correct notice text
								createWarningNotice( mainTagCount );
							}
						}
					}
				}, 'core/editor' );
			}
		}, [ 'core/editor' ] );

		// To unsubscribe from the changes, you can call unsubscribe() whenever you need to stop listening for changes
	}
	// Initiate the function
	monitorEditorChanges();

	/**
	 * Recursive function to check for the main tag in the template content
	 * @param {object} blocks 			Blocks object
	 * @param {number} mainTagCount 	Number of main tags found
	 * @returns 
	 */
	const checkMainTag = ( blocks, mainTagCount ) => {
		// Loop through all blocks
		blocks.forEach( ( block ) => {
			// Check if the block has a main tag
			if ( block.attributes.tagName === 'main' ) {
				mainTagCount++;
			}
			// If the block has innerBlocks, call the function again
			if ( block.innerBlocks.length > 0 ) {
				mainTagCount = checkMainTag( block.innerBlocks, mainTagCount );
			}
		} );

		return mainTagCount;
	};

	/**
	 * Create the warning notice, content depends on the number of main tags found
	 * @param {number} mainTagCount 	Number of main tags found
	 */
	const createWarningNotice = ( mainTagCount ) => {

		// Default notice text when no main tag is found
		let noticeText = __( 'Improve your website accessibility: This template does not contain a <main> HTML tag, so currently no skip links are available on your website. Please update a top level group block containing the site content to use the <main> HTML tag in the block settings under `Advanced > HTML Element`. You can find more information in our Helpcenter article linked below.', 'greyd-wp' );

		// If there is more than one main tag, change the notice text to include the number found and give advice how to set it up correctly
		if ( mainTagCount > 1 ) {
			// Write out numbers as words for anything between 2 and 10
			const numbers = {
				2: __( 'two', 'greyd-wp' ),
				3: __( 'three', 'greyd-wp' ),
				4: __( 'four', 'greyd-wp' ),
				5: __( 'five', 'greyd-wp' ),
				6: __( 'six', 'greyd-wp' ),
				7: __( 'seven', 'greyd-wp' ),
				8: __( 'eight', 'greyd-wp' ),
				9: __( 'nine', 'greyd-wp' ),
				10: __( 'ten', 'greyd-wp' )
			};

			// replace mainTagCount with the number if found in the numbers array
			if ( numbers[ mainTagCount ] ) {
				mainTagCount = numbers[ mainTagCount ];
			}

			// If the number is above 10, the number is used as is
			noticeText = sprintf(
				__( 'Improve your website accessibility: This template contains %s blocks with the <main> HTML tag, which is not recommended. Please reduce the number to one block on the top level that contains the site content. You can find more information in our Helpcenter article linked below.', 'greyd-wp' ),
				mainTagCount
			);
		}

		wp.data.dispatch( 'core/notices' ).createNotice(
			'warning', // Can be one of: success, info, warning, error.
			noticeText, // Text string to display.
			{
				id: 'greyd-a11y-main-notice', // Custom ID. Set to avoid duplication.
				actions: [
					{
						url: 'https://helpcenter.greyd.io/missing-main-element/',
						label: __( 'I get a notice that a main element is missing?', 'greyd-wp' ),
					},
				],
			}
		);
	};

} )( window.wp );