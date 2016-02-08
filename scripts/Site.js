import modal from './modal.min';

function Site($, params) {

	let options = params || {};
	

	$('#callback-form-btn').on('click', function(e) {
		$('#signup-modal').modal();

		
	});


}

export default Site;