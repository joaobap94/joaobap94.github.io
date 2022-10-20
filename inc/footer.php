
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="js/datatable.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bxslider.js"></script>
<script src="js/isotope.pkgd.min.js"></script>



<script>
    $(document).ready(function(){
        if ($(window).width() < 500){
            $('#datatable-exp').DataTable( {
                "columnDefs": [
                    {
                        "targets": [ 2 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registos por página",
                    "zeroRecords": "Nenhum registo encontrado",
                    "sSearch": "Procurar:",
                    "sInfo": "A mostrar de _START_ até _END_ de _TOTAL_ registos",
                    "sInfoEmpty": "Não existe registos",
                    "infoFiltered": "(Filtrado de _MAX_ registos em total)"
                }
            } );
        }
        else{
            $('#datatable-exp').DataTable( {
                responsive: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registos por página",
                    "zeroRecords": "Nenhum registo encontrado",
                    "sSearch": "Procurar:",
                    "sInfo": "A mostrar de _START_ até _END_ de _TOTAL_ registos",
                    "sInfoEmpty": "Não existe registos",
                    "infoFiltered": "(Filtrado de _MAX_ registos em total)"
                }
            } );
        }

    $('.slider-quemsou').bxSlider({
        auto: false,
        pager: false,
        slideWidth: 300
    });
        jQuery('.skillbar').each(function(){
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },6000);
        });
   /* $('.notas').isotope({
        // options
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });*/

        $( function() {
            // quick search regex
            var qsRegex;
            var buttonFilter;

            // init Isotope
            var $container = $('.notas').isotope({
                itemSelector: '.skillbar',
                layoutMode: 'fitRows',
                filter: function() {
                    var $this = $(this);
                    var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
                    var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
                    return searchResult && buttonResult;
                }
            });

            $('#filters').on( 'click', 'button', function() {

                buttonFilter = $( this ).attr('data-filter');
                $container.isotope();
            });

            // use value of search field to filter
            var $quicksearch = $('#quicksearch').keyup( debounce( function() {
                qsRegex = new RegExp( $quicksearch.val(), 'gi' );
                $container.isotope();
            }) );


            // change is-checked class on buttons
            $('.button-group').each( function( i, buttonGroup ) {
                var $buttonGroup = $( buttonGroup );
                $buttonGroup.on( 'click', 'btn', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $( this ).addClass('is-checked');
                });
            });
            

        });

// debounce so filtering doesn't happen every millisecond
        function debounce( fn, threshold ) {
            var timeout;
            return function debounced() {
                if ( timeout ) {
                    clearTimeout( timeout );
                }
                function delayed() {
                    fn();
                    timeout = null;
                }
                setTimeout( delayed, threshold || 100 );
            };
        }
        $("#navbar li a").click(function(){
            $("#navbar").removeClass("in");
            switch ($(this).text()){
                case "Sobre Mim":
                    $("html, body").animate({
                        scrollTop: $("#about").offset().top - 50
                    }, 1000);
            break;
        case "Competências":
            $('html, body').animate({
                scrollTop:  $("#compt").offset().top - 50
            }, 1000);
            break;
        case "Tecnologias que domino":
            $('html, body').animate({
                scrollTop:  $("#ling").offset().top - 50
            }, 1000);
            break;
        case "As Minhas Notas":
            $('html, body').animate({
                scrollTop:  $("#notas").offset().top - 50
            }, 1000);
            break;
        case "FAQ":
            $('html, body').animate({
                scrollTop:  $("#faq").offset().top - 50
            }, 1000);
            break;
            return false;
        }
    });

    });


</script>

