<style>
.Attention{
animation: pulseCat 0.8s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 white;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
	
.Repo{
animation: pulseCat 0.8s infinite;	
}
@keyframes pulseCat {
10% {
box-shadow: 0 0 0 0 grey;
}
80% {
box-shadow: 0 0 0 25px rgba(204, 169, 44, 0);
}	
100% {
box-shadow: 0 0 0 0 rgba(204, 169, 44, 0);
}
}
	
	
	
@keyframes ldio-entgl9wkzda-1 {
    0% { transform: rotate(0deg) }
   50% { transform: rotate(-45deg) }
  100% { transform: rotate(0deg) }
}
@keyframes ldio-entgl9wkzda-2 {
    0% { transform: rotate(180deg) }
   50% { transform: rotate(225deg) }
  100% { transform: rotate(180deg) }
}
.ldio-entgl9wkzda > div:nth-child(2) {
  transform: translate(-15px,0);
}
.ldio-entgl9wkzda > div:nth-child(2) div {
  position: absolute;
  top: 40px;
  left: 40px;
  width: 120px;
  height: 60px;
  border-radius: 120px 120px 0 0;
  background: #eeb440;
  animation: ldio-entgl9wkzda-1 1s linear infinite;
  transform-origin: 60px 60px
}
.ldio-entgl9wkzda > div:nth-child(2) div:nth-child(2) {
  animation: ldio-entgl9wkzda-2 1s linear infinite
}
.ldio-entgl9wkzda > div:nth-child(2) div:nth-child(3) {
  transform: rotate(-90deg);
  animation: none;
}@keyframes ldio-entgl9wkzda-3 {
    0% { transform: translate(190px,0); opacity: 0 }
   20% { opacity: 1 }
  100% { transform: translate(70px,0); opacity: 1 }
}
.ldio-entgl9wkzda > div:nth-child(1) {
  display: block;
}
.ldio-entgl9wkzda > div:nth-child(1) div {
  position: absolute;
  top: 92px;
  left: -8px;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: #290908;
  animation: ldio-entgl9wkzda-3 1s linear infinite
}
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(1) { animation-delay: -0.67s }
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(2) { animation-delay: -0.33s }
.ldio-entgl9wkzda > div:nth-child(1) div:nth-child(3) { animation-delay: 0s }
.loadingio-spinner-bean-eater-rmydrbgmg5 {
  width: 200px;
  height: 200px;
  display: inline-block;
  overflow: hidden;
  background: none;
}
.ldio-entgl9wkzda {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(1);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-entgl9wkzda div { box-sizing: content-box; }
</style>

<!-- Turn ON/OFF --> 
<div class="modal fade" tabindex="-1" id="TipsModal">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white h4"><div class="modal-title mx-auto">ForAlexa</div></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5"><?php echo($TipsModal);?></div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>


<!-- Help  -->
<div class="modal fade" tabindex="-1" id="HelperModal">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">
<p>You are on the Repositories page.</p>
<p>You can create a new repository here by clicking on <a href="index.php?p=NewRepository&Action=CDS" class="btn btn-dark btn-lg Repo"><i class="fas fa-plus"></i></a></p>	
<p>Remember that you can create as many as five repositories, which are valid for up to <b>90</b> days</p>
<p>You can edit the information in each repository using <button class="btn-primary btn btn-lg"><i class="fas fa-edit"></i></button></p>
<p>You can also exclude the repository and its contents using <button class="btn-danger btn btn-lg"><i class="fas fa-trash-alt"></i></button></p>
<p>Finally, you can access the repository to view the intents at <button class="btn-success btn btn-lg"><i class="fas fa-external-link-alt"></i></button></p>	
</div>	
<div class="modal-footer bg-dark"><button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button></div>
</div>
</div>
</div>



<!-- Primeiro Acesso  -->
<div class="modal fade" tabindex="-1" id="RepositoriesEnd">
<div class="modal-dialog modal-dialog-centered modal-xl">
<div class="modal-content">
<div class="modal-header bg-dark text-white"><h5 class="modal-title mx-auto">ForAlexa</h5></div>
<div style="line-height: 3.5;" class="modal-body text-center mt-2 h5">You have already registered two repositories.<br>Congratulations!!<br>From now on, if you forget how to register a new repository, you can consult the manual at <a class="btn btn-dark btn-lg" style="color: white;" href="Manual/Manual_ForAlexa_English.pdf" target="_blank" role="button"><i class="fas fa-file-pdf mr-2"></i><?php if($device == "PC") {echo("Manual");}?></a></div>
<div class="modal-footer bg-dark"><button type="button" class="btn btn-success btn-lg" data-dismiss="modal"><i class="fas fa-2x mr-2 fa-thumbs-up"></i>OK</button></div>
</div>
</div>
</div>


<!-- Carregando base de dados  -->
<div class="modal fade" tabindex="-1" id="Consult">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header bg-light text-dark">
<h5 class="modal-title mx-auto">Loading Database</h5>
</div>
<div class="modal-body text-center">		
<div class="loadingio-spinner-double-ring-1erlfmkoj4g"><div class="ldio-whak2g63h6">
<div></div>
<div></div>
<div><div></div></div>
<div><div></div></div>
</div></div>
<link rel="stylesheet" href="Loading.css">
</div>
<div class="modal-footer">Please wait...</div>	
</div>
</div>
</div>