<script language="javascript">
	
var IntentName = $("#IntentName");	
IntentName.blur(function() { 	
$.ajax({ 	
url: 'Intent.php', 
type: 'POST', 
data:{"IntentName" : IntentName.val()}, 
success: function(data) { 
console.log(data); 
data = $.parseJSON(data);
$('#IntentName').removeClass('bg-danger').removeClass('bg-success').addClass(data.IntentName);
$('#Scroll').hide();
$('#Success').hide();
$('#Danger').hide();	
$(data.Icon).show();	
}});
}); 

// Add Input
$(document).ready(function() {
var max_fields 	= 50; //maximum input boxes allowed
var wrapper 	= $(".input_fields_wrap"); //Fields wrapper
var add_button 	= $(".add_field_button"); //Add button ID

var x = 0; //initlal text box count
$(add_button).click(function(e) { //on add input button click
e.preventDefault();
var length = wrapper.find("input:text").length;
if (x < max_fields) 
{ //max input box allowed
x++; //text box increment
if (x > 0){	
document.getElementById('luan').innerHTML = x;
document.getElementById('qtde_quotes').value = x;	
}	
$(wrapper).prepend('<div><div class="input-group mt-3"><input type="text" name="RandomQuotes_' + (length+1) + '" class="form-control form-control-lg" id="RandomQuotes_' + (length+1) + '" placeholder="Add a random phrase"/><div class="input-group-append"><div class="input-group-text"><a href="#" class="remove_field"><i style="color: black;" class="fas fa-2x fa-trash-alt"></i></a></div></div></div></div>'); //add input box
}});

// Remove Fields	
$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
e.preventDefault();
$(this).parent('div').parent('div').parent('div').parent('div').remove();
x--;
document.getElementById('luan').innerHTML = x;
document.getElementById('qtde_quotes').value = x;	
})
});
	
	
// Function Random Intent Name	
function getRandomString() {
var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
var length = 15;	
var result = '';
for ( var i = 0; i < length; i++ ) {
result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
}
document.getElementById('IntentName').focus();	
document.getElementById('IntentName').value = result;
document.getElementById('IntentName').blur();	
}	
</script>
<script>
function verificar(){
var texto = document.getElementById("IntentName").value;
for (letra of texto){
if (!isNaN(texto)){
alert("Do not enter numbers");
document.getElementById("IntentName").value="";
return;
}
Permitir = "ABCEDFGHIJKLMNOPQRSTUVXWYZabcdefghijklmnopqrstuvxwyz"
var ok = false;
for (letra2 of Permitir ){
if (letra==letra2){
ok=true;
}}
	
if (!ok){
alert("Intent name can only contain case-insensitive alphabetic characters and underscores. Numbers, spaces, or other special characters are not allowed.");
$('#IntentName').removeClass('bg-danger').removeClass('bg-success');	
document.getElementById("IntentName").value="";		
return; 
}
}}	
</script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();   
});
</script>