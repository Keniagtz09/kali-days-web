<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kali Days | YeohaengLife</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <div class="main-container">
        <header class="site-header">
            <div class="logo-container">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Kali Days" style="width: 250px; height: auto;">
            </div>
            <nav class="main-nav">
                <ul>
                    <li>Inicio</li>
                    <li>Destinos</li>
                    <li>Slow Life</li>
                    <li>Contacto</li>
                </ul>
            </nav>
        </header>

        <div class="form-banner" style="width: 100%; margin-top: 50px;">
            <img src="{{ asset('img/img_inicio.jpg') }}" alt="Explora más" 
                style="width: 100%; height: 300px; object-fit: cover; border-radius: 8px; filter: grayscale(20%);">
        </div>

        <section class="hero">
            <div class="hero-text">
                <h1>KALI DAYS</h1>
                <p class="subtitle">Sueña, viaja y vive.</p>
            </div>
        </section>

        <main class="content-body">
            <section class="intro">
                <h2>Explorando Corea y el mundo a paso lento</h2>
                <p>Una bitácora visual sobre la belleza de lo cotidiano y la calma de viajar.</p>
            </section>

        <div class="video-section">
            <h3>Mis Vlogs Guardados:</h3>
            
            @foreach($vlogs as $vlog)
                <div class="vlog-card" style="background: #fff; border: 1px solid #eee; padding: 20px; margin-bottom: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <h4 style="font-family: 'Playfair Display', serif; font-size: 1.5rem; margin-bottom: 10px;">{{ $vlog->titulo }}</h4>
                    <p style="color: #666; margin-bottom: 15px;">{{ $vlog->descripcion }}</p>
                    <p style="font-size: 0.8rem; color: #999;">Publicado el: {{ $vlog->fecha_publicacion }}</p>
                    <form action="{{ route('vlogs.destroy', $vlog->id) }}" method="POST" onsubmit="return confirm('¿Estás segura de eliminar este vlog?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer; margin-top: 10px;">
                            Eliminar entrada
                        </button>
                        <a href="{{ route('vlogs.edit', $vlog->id) }}" style="display: inline-block; background: #3498db; color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none; margin-top: 10px;">
                            Editar entrada
                        </a>
                    </form>
                    
                    @if($vlog->url_video)
                        <div class="video-wrapper" style="margin-top: 15px;">
                            {{-- Convertimos la URL normal de YouTube a una de embeber --}}
                            @php
                                $url = str_replace('watch?v=', 'embed/', $vlog->url_video);
                            @endphp
                            <iframe width="100%" height="315" src="{{ $url }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
            @endforeach

            @if($vlogs->isEmpty())
                <p>Aún no hay vlogs registrados. ¡Usa el formulario de abajo para empezar!</p>
            @endif
        </div>
        </main>

        <section id="admin-vlogs" style="background: #f9f9f9; padding: 40px; margin: 20px 0; border-radius: 8px;">
            <h2 style="color: #333; margin-bottom: 20px;">Registrar nueva experiencia</h2>
            
            <form action="{{ route('vlogs.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold;">Título del Vlog:</label>
                    <input type="text" name="titulo" style="width: 100%; padding: 8px;" placeholder="Ej. Caminata por Seúl" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold;">Descripción:</label>
                    <textarea name="descripcion" style="width: 100%; padding: 8px;" rows="3" placeholder="¿Qué sentiste hoy?" required></textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold;">Enlace de YouTube (URL):</label>
                    <input type="url" name="url_video" style="width: 100%; padding: 8px;" placeholder="https://www.youtube.com/watch?v=...">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold;">Fecha de publicación:</label>
                    <input type="date" name="fecha_publicacion" style="width: 100%; padding: 8px;" required>
                </div>

                <button type="submit" style="background: #333; color: #fff; padding: 10px 20px; border: none; cursor: pointer; border-radius: 4px;">
                    Guardar en mi bitácora
                </button>
            </form>
        </section>


        <footer class="site-footer">
            <div class="footer-grid">
                <div class="footer-item">
                    <h4>Curso</h4>
                    <p>Conceptualización de servicios en la nube</p>
                </div>
                <div class="footer-item">
                    <h4>Alumno</h4>
                    <p>Kenia Monserrat Gutiérrez Alemán</p>
                    <p>Código: 207507852</p>
                </div>
                <div class="footer-item">
                    <h4>Contacto</h4>
                    <p><a href="mailto:gutierrezalemank09@gmail.com">gutierrezalemank09@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Kali Days | YeohaengLife</p>
            </div>
        </footer>
    </div>

</body>
</html>