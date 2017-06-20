			<footer>
				© 2017 Simple S.A. Todos los derechos reservados
			</footer>
		</div>
	</body>
	<script type="text/javascript">
		/*
		 * Función para agregar calendario a los inputs de fechas
		*/
		$(document).ready(function(){
			$( ".fechas" ).datepicker(
				{
				  changeYear: true,
				  yearRange: "-100:+0",
				  dateFormat: "yy-mm-dd"
				}
			);

			/*
			 * Paginación ajax candidatos
			*/
			function load_candidate_data(page) {
				$.ajax({
					url: '<?php echo base_url(); ?>ajax_pagination/pagination/'+page,
					method: "GET",
					dataType: "json",
					success: function(data)
					{
						$('#candidates_table').html(data.candidates_table);
						$('#pagination_link').html(data.pagination_link)
					}
				});
			}
			load_candidate_data(1);
			$(document).on("click", ".pagination li a", function(event){
				event.preventDefault();
				var page = $(this).data("ci-pagination-page");
				load_candidate_data(page);
			});
		})
		/*
		 * Función Para clonar los campos de información academica
		*/
		$('#clone_educacion').click(function(){
			var info_academica = $('.info_academica')
			    .clone()
			    .removeClass('info_academica')
			    .appendTo('.cloned_info_academica');
		})
		/*
		 * Función Para clonar los campos de experiencia laboral
		*/
		$('#clone_laboral').click(function(){
			var info_laboral = $('.info_laboral')
			    .clone()
			    .removeClass('info_laboral')
			    .appendTo('.cloned_info_laboral');
			info_laboral.find('.fechas_cloned')
			    .attr("id", "")
			    .removeClass('hasDatepicker')
			    .removeData('datepicker')
			    .unbind()
			    .datepicker(
			    	{
					    changeYear: true,
					    yearRange: "-100:+0",
					    dateFormat: "yy-mm-dd"
					}
			    );
			info_laboral.find('.inputs_logros')
				.remove();

		})
		/*
		 * Función Para clonar los campos de los logros
		*/
		/*$(document).on('click', '.clone_logro', function(){
			var info_logros = $('.info_logros')
			    .clone()
			    .removeClass('info_logros')
			    .appendTo('.cloned_info_logros');
		})*/

		$(document).on('click', '.borrar', function(){
			$(this).parents(':eq(2)').remove();
		})
		/*
		 * Función para el envio y validación del formulario co ajax
		*/
		$( "#form_store_person" ).submit(function(e) {
	      	var form_dates = new FormData($(this)[0]);
	        $.ajax({
                type: 'POST',
                url: '<?php echo site_url('candidates/candidate_store'); ?>',
                data: form_dates,
                dataType: "json",
                contentType: false,
    			processData: false,
    			beforeSend: function(){
    				$('.cargando').css('display', 'block');
    			},
                success:function(result){
                	if(result.estado){
	                	alert('Tu hoja de vida fue guardada exitosamente, muchas gracias');
	                	window.location = '<?php echo site_url('/'); ?>';
					}else{
						$.each(result, function(key, value){
							$('#e'+key).text(value);
						});
					}
					$('.cargando').css('display', 'none');
                },
                error:function(){
                	alert("Error al guardar al candidato");
            		$('.cargando').css('display', 'none');
                }
            });
            e.preventDefault();
	    });
	    /*
		 * Función Para cargar la información de la configuración de los correos de manera dinamica con ajax
		*/
		$( "#proceso" ).change(function() {
	      	var proceso = $('#proceso').val();
	        $.ajax({
                type: 'POST',
                url: '<?php echo site_url('parametrizacion/select'); ?>',
                data:{'proceso':proceso},
                dataType: 'json',
                success:function(result){
                	if (!result) {
                		$('.text_clean').val('');
                		}else{
	 						$.each(result, function(key, value){
	 							$('#'+key).val(value)
    						});
                		}
                }
            });
	    });

	</script>
</html>
