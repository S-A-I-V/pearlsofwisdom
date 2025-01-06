<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pearls of Wisdom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Merriweather', serif;
            background-color: #fef8f3;
            color: #333;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .header {
            background: linear-gradient(to right, #bf360c, #e64a19);
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 0;
        }

        .header p {
            font-size: 1.2rem;
            margin-top: 5px;
        }
        .alphabet-nav {
            background-color: #fff8e1;
            padding: 20px;
            border-bottom: 1px solid #ffe0b2;
            margin-bottom: 20px;
        }

        .alphabet-nav a {
            display: inline-block;
            margin: 5px;
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #e64a19;
            border: 2px solid #e64a19;
            border-radius: 20px;
            text-decoration: none;
        }

        .alphabet-nav a.active {
            background-color: #e64a19;
            color: #fff;
        }

        .alphabet-nav a:hover {
            background-color: #ff7043;
            color: #fff;
        }
        .card-container {
            perspective: 1000px;
            padding: 10px;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 220px;
            transform-style: preserve-3d;
            transition: transform 1s ease, box-shadow 1s ease;
            cursor: pointer;
            border-radius: 10px;
        }

        .flip-card.flipped {
            transform: rotateY(180deg);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .flip-card-inner {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .flip-card-front {
            background-color: #fff8e1;
            color: #e64a19;
        }

        .flip-card-back {
            background-color: #e64a19;
            color: #fff;
            transform: rotateY(180deg);
        }

        .footer {
            background-color: #bf360c;
            color: #fff;
            text-align: center;
            padding: 10px 20px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .alphabet-nav a {
                font-size: 0.9rem;
                padding: 8px 12px;
            }

            .flip-card {
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Pearls of Wisdom</h1>
        <p>Discover teachings of wisdom, alphabetically organized for your journey.</p>
    </div>
    <div class="alphabet-nav text-center">
        @foreach(array_keys($pearls) as $alpha)
            <a href="{{ route('pearls.index', ['alphabet' => $alpha]) }}"
               class="{{ $selectedAlphabet === $alpha ? 'active' : '' }}">
                {{ $alpha }}
            </a>
        @endforeach
    </div>
    <div class="container quotes">
        <div class="row">
            @if(count($quotes) > 0)
                @foreach($quotes as $quote)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card-container">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <h5>{{ $quote['title'] }}</h5>
                                    </div>
                                    <div class="flip-card-back">
                                        <p>{{ $quote['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted">No quotes available for <strong>{{ $selectedAlphabet }}</strong>.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2025 Pearls of Wisdom | Inspired by Mahavishnu Goswami</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.flip-card').forEach(card => {
            card.addEventListener('mousemove', () => {
                card.classList.add('flipped');
            });
            card.addEventListener('mouseleave', () => {
                card.classList.remove('flipped');
            });
        });
    </script>
</body>
</html>
