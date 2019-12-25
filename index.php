<!DOCTYPE html>
<html>
<head>
<?php include ("structure/head.php");?>
</head>
<body> 
    <div class="page-wrapper">
		<div class="sitetoolbar">
			<?php include ("structure/menu.php");?>
		</div>
		<div class="page page_inner_padding page_sidebar-animation-on">
			<script>
				if(localStorage.noSidebar) {
					document.querySelector(".page").classList.remove("page_sidebar_on");
					var pageWrapper = document.querySelector(".page-wrapper");
					pageWrapper && pageWrapper.classList.remove("page-wrapper_sidebar_on")
				}
				setTimeout(function() {
					document.querySelector(".page").classList.add("page_sidebar-animation-on")
				}, 0); 
			</script>
			<div class="page__inner">
				<main class="main main_width-limit">
					<?php include ("structure/content.php"); ?> 
				</main>
			</div>
		</div>
	</div>
</body>
</html>
