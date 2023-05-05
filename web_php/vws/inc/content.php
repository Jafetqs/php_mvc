<section>
    <!-- aun te interesa -->
    <?php if(isset($_SESSION['identity'])):?>
    <h4 class="text-center my-5">Bienvenido <?= $_SESSION['identity']->nombre?></h4>
    <div class="text-center my-2">
        <a href="<?=brl?>usuario/upu&id=<?= $_SESSION['identity']->id_usuario?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Editar Perfil"><img
                class="img_user" src="<?= brl."".$_SESSION['identity']->foto?>" alt=""></a>

    </div>

    <?php endif;?>
    <div>

    </div>

    <!-- por que elegirnos -->
    <div id="por-que-elegirnos" class="bg-light py-5">
        <div class="container my-5">
            <h2 class="text-center mb-4">¿Por qué elegir VINMUBLES.COM?</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 h-100 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Experiencia</h4>
                            <p class="card-text">Nuestro equipo de expertos en bienes raíces cuenta con años de
                                experiencia en el sector. Sabemos cómo encontrar las mejores oportunidades de inversión
                                y ayudarte a cerrar el trato.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 h-100 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Variedad</h4>
                            <p class="card-text">Ofrecemos una amplia selección de propiedades, desde apartamentos hasta
                                casas de lujo y propiedades comerciales. Sea cual sea tu presupuesto o tus necesidades,
                                tenemos algo para ti.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 h-100 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Atención al cliente</h4>
                            <p class="card-text">En VIMUBLE.COM, nos comprometemos a brindarte un servicio personalizado
                                y de alta calidad. Nuestros agentes te ayudarán en cada paso del proceso de compra o
                                venta de propiedades.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 h-100 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Tecnología</h4>
                            <p class="card-text">Utilizamos las últimas tecnologías y herramientas para hacer que el
                                proceso de búsqueda y compra de propiedades sea más fácil y eficiente para ti.</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-6 mb-4">
                    <div class="card border-0 h-100 shadow">
                        <div class="card-body">
                            <h4 class="card-title">Transparencia</h4>
                            <p class="card-text">En VIMUBLE.COM, creemos en la transparencia y la honestidad en todo lo
                                que hacemos. Te proporcionamos información clara y detallada sobre cada propiedad para
                                que puedas tomar decisiones informadas.</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- NUESTRAS PROPIEDADES -->

    <h2 class="text-center text-bold my-5">Nuestras Propiedades</h2>
    <div id="carouselCaptions" class="carousel slide w-50 mx-auto  mb-5" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="8" aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="9"
                aria-label="Slide 10"></button>


        </div>
        <?php if(isset($props) || $props):?>
        <div class="carousel-inner">
            <?php 
            $i=0;
            while($inmb = $props->fetch_object()):
                $i+=1;
            ?>
            <?php if($i==1) :?>
            <div class="carousel-item active">
                <?php else :?>
                <div class="carousel-item">
                    <?php endif;?>
                    <img src="<?=brl?><?=$inmb->img1?>" class="d-block w-100" style="height:600px;" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-dark">
                        <h3 class="text-white"><?=$inmb->nombre?></h5>
                            <p><?=$inmb->provincia?>, <?=$inmb->direccion?></p>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php endif; ?>


        <section class="about-us-section">
            <div class="container">
                <div class="row d-flex flex-col flex-lg-row">
                    <div class="col-md-6 my-5 my-md-0">
                        <h2>Sobre nosotros</h2>
                        <p> VINMUBLES.COM, es una empresa virtual dedicada a la venta de props en todo el territorio
                            nacional. Contamos con una amplia variedad de propiedades para satisfacer las necesidades de
                            nuestros clientes, ya sea que estén buscando una casa, un apartamento, un terreno o una
                            propiedad comercial.</p>
                        <p>Nuestro objetivo es brindar un servicio de alta calidad, basado en la honestidad, la
                            transparencia y la ética profesional. Trabajamos de la mano con nuestros clientes para
                            entender sus necesidades y ayudarlos a encontrar la propiedad que mejor se adapte a ellas.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="<?=brl?>assets/img/trato.jpg" alt="Imagen de la empresa" class="w-100">
                    </div>
                </div>
            </div>
        </section>
        <!-- <iframe width='100%' height='400px'
            src="https://api.mapbox.com/styles/v1/dantser/clgmoc1zi002t01nyc4r50wlf.html?title=false&access_token=pk.eyJ1IjoiZGFudHNlciIsImEiOiJjbGdtbzZvNW4wNzd0M29wODB4Zmltcng3In0.OtzcfM5ENwEh_QNT92ffJg&zoomwheel=false#1.57/38.7/-83.1"
            title="Streets" style="border:none;"></iframe> -->
            <h2 class="text-center my-5">Sede Informativa</h2>

        <div id="map"></div>
        <script>
   
        mapboxgl.accessToken ='pk.eyJ1IjoiZGFudHNlciIsImEiOiJjbGdtbzZvNW4wNzd0M29wODB4Zmltcng3In0.OtzcfM5ENwEh_QNT92ffJg';

        var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/streets-v11',
			center: [-84.103909, 9.938542],
			zoom: 15
		});
		// Agrega el marcador personalizado con nombre e imagen
		new mapboxgl.Marker()
			.setLngLat([-84.103909, 9.938542])
			.addTo(map)
			.setPopup(new mapboxgl.Popup({ offset: 25 }) // Agrega un popup
			.setHTML('<h3>Real Estate G17</h3><p>Bienes Raices.</p><img src="https://mabinsa.com/bienes-raices-costa-rica/wp-content/uploads/2017/01/principal-560x360.jpg" class="mapboxgl-popup-image w-100 active">'));
        </script>
        <!-- testimonios -->
        <div id="testimonials" class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-5">Testimonios</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                </div>
                                <p class="card-text">"Vinmubles me ayudó a encontrar mi casa ideal de manera rápida y
                                    eficiente. Excelente servicio al cliente.</p>
                                <h5 class="card-title mb-0">Jafet Jiménez</h5>
                                <p class="card-subtitle mb-2 text-muted">Comprador</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="far fa-star text-warning"></i></div>
                                </div>
                                <p class="card-text">"Gracias a Vinmubles, encontré el departamento que estaba buscando.
                                    El
                                    proceso fue muy fácil y la atención al cliente es excepcional.</p>
                                <h5 class="card-title mb-0">Ana López</h5>
                                <p class="card-subtitle mb-2 text-muted">Compradora</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex mb-3">
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="fas fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="far fa-star text-warning"></i></div>
                                    <div class="me-2"><i class="far fa-star text-warning"></i></div>
                                </div>
                                <p class="card-text">"Me gustó mucho la variedad de propiedades en el sitio web de
                                Vinmubles.
                                    Sin embargo, tuve un pequeño problema con la atención al cliente, ya que la señora
                                    que atiende nisiquiera me saludó.
                                </p>
                                <h5 class="card-title mb-0">Meredith Sanchez</h5>
                                <p class="card-subtitle mb-2 text-muted">Compradora</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</section>