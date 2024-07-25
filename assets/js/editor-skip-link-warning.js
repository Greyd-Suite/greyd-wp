wp.plugins.registerPlugin(
	'greyd-skip-link-warning-js',
	{
		render: () => {

			let current_post_type = wp.data.select( 'core/editor' ).getCurrentPostType();
			console.log('current_post_type');
			console.log(current_post_type);
			console.log('-----------------');

			wp.data.dispatch( 'core/notices' ).createNotice(
				'warning', // Can be one of: success, info, warning, error.
				'Warning from the JS side', // Text string to display.
				{
					isDismissible: false, // Whether the user can dismiss the notice.
					// Any actions the user can perform.
					actions: [
						{
							url: '#',
							label: 'View post',
						},
					],
				}
			);
		},
	}
);