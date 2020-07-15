

			<div class="row">

					<? foreach($css_files as $file): ?>

                    <link type="text/css" rel="stylesheet" href="<?=$file; ?>" />

                    <? endforeach;?>

                    <? foreach($js_files as $file): ?>

                    <script src="<?=$file; ?>"></script>

                    <? endforeach;?>

                    <script type="text/javascript">

                    $(document).ready(function() {

						$('.various').fancybox({

						  fitToView : true,

						  width  : '100%',

						  height  : '800px',

						  autoSize : false,

						  closeClick : false,

						  openEffect : 'elastic',

						  closeEffect : 'elastic'

						});

                    });

                    </script>

					<?=$output?>

				

			</div>

		</div>
<script>
$(function(){
	$('.open_s').hover(function(){
		$(this).find('ul').slideDown('slow');
	},function(){
		$(this).find('ul').slideUp('slow');
	});
});
</script>
	</body>

</html>