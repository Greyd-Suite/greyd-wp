document.addEventListener( "DOMContentLoaded", function () {
	let greyd_notice_dismiss = document.querySelector( "#greyd_notice_dismiss" );
	if ( greyd_notice_dismiss ) {
		document.querySelector( "#greyd_notice_dismiss .button-dismiss" ).addEventListener( "click", ( e ) => {
			const data = {
				action: 'hide_dismissible_admin_notice',
				nonce: ajax_var.nonce,
			};

			document.querySelector( "#greyd_notice_dismiss .button-dismiss" ).classList.add( 'disabled' );

			fetch( ajaxurl, {
				method: "post",
				headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
				body: new URLSearchParams( data ).toString(),
			} ).then( function ( response ) {
				document.querySelector( "#greyd_notice_dismiss" ).remove();
				return response.text();
			} ).then( function ( response ) {
				console.log( response );
			} );
		} );
	}
} );