/*
 * Author:           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * Copyright:        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * License:          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * Link:             http://github.com/pH-7/
 */

$('#submit').click( function()
{
    var sFormName = 'form[name=calculator] ';
    var oData = 
	{
		op : $(sFormName + '#operation').val(), 
		lho : $(sFormName + '#left_operand').val(), 
		rho : $(sFormName + '#right_operand').val()
	};

    $.get('call.php', oData, function(oOutput)
	{
		$('#result').text( $(oOutput).find('result').text() );
		$('#summary').text( $(oOutput).find('summary').text() );
	});
});