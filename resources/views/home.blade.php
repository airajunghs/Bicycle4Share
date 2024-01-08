@extends('layouts.default')

@section('contents')

    <head>
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                margin: 0;
                font-family: Garamond, serif;
            }

            .dashboard {
                flex: 1;
                background-image: url('/images/umpback.jpg');
                background-size: cover;
                background-repeat: no-repeat;
            }

            .contact-section {
                background-color: rgba(138, 164, 255, 0.23);
                padding: 20px;
            }

            .content-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                flex: 1;
                margin-top: 20%;
                padding: 20px;
            }

            .footer {
                background-color: rgba(138, 164, 255, 0.23);
                /* padding: 20px; */
                text-align: center;
                /* color: white; */
                margin-top: 43%;
            }

            #containerImage1 {
                background-image: url('/images/dashboardleft.jpg');
            }

            #containerImage2 {
                background-image: url('/images/dashboardcenter.jpg');
                background-size: 100%;
                /* Adjust to 'cover' if you prefer a different behavior */
                background-repeat: no-repeat;
                background-position: center center;
                /* Center the image */
                border-radius: 20px;
                width: 286px;
                height: 149px;
                flex-shrink: 0;
                text-align: left;
                padding-left: 20px;
                border: 1px solid #ccc;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

            }

            #containerImage3 {
                background-image: url('/images/dashboardright.jpg');
                background-size: 100%;
                /* Adjust to 'cover' if you prefer a different behavior */
                background-repeat: no-repeat;
                background-position: center center;
                /* Center the image */
                border-radius: 20px;
                width: 286px;
                height: 149px;
                flex-shrink: 0;
                text-align: left;
                padding-left: 20px;
                border: 1px solid #ccc;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            }

            #container {
                margin-top: 10%;
                margin-right: 1%;
                float: none;
            }
        </style>
    </head>

    {{-- <div class="dashboard"> --}}
    <center>
        <p class="title">Welcome {{ Auth::user()->name }}</p>
        <div class="px-10  d-flex align-items-center justify-content-center" id="container">
            <div class="row gx-4">
                <div class="col">
                    <div class="containerImage" id="containerImage1">

                    </div>
                    <div class="containerImage-word">
                        <p style="height: 100%; text-align: left; margin: 0;">
                            <br>
                            At Kolej Kediaman 4, UMPSA, an exciting project is underway to refurbish old bicycles. Residents are actively involved in repairing and repainting these bicycles, injecting new life and vibrant colors into the campus. The initiative goes beyond aesthetics, incorporating personalized stickers for individual bicycle IDs to enhance organization and security. Once restored and adorned, the bicycles will be strategically distributed across different areas of the university. This thoughtful approach aims to promote sustainability, community engagement, and a sense of collective responsibility. As the project unfolds, anticipation grows for the positive impact it will bring to both the environment and the university community.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="containerImage" id="containerImage2">
                        <div class="tutorial">
                            <p id="containerImage"><br></p>
                        </div>
                    </div>
                    <div class="containerImage-word">
                        <p style="height: 100%; text-align: left; margin: 0;">
                            <br>
                            In the vibrant setting of Kolej Kediaman 4, Universiti Malaysia Pahang Al-Sultan Abdullah (UMPSA), excitement is building for the upcoming inauguration of the Bicycle4Share program. The grand opening ceremony, known as Majlis Perasmian, is set to feature the esteemed presence of the Chairman of the University's Student Council (LPU). This groundbreaking initiative underscores a commitment to sustainable transportation and community connectivity, as residents eagerly anticipate the ceremonial launch of a shared bicycle program. The event promises to be a momentous occasion, symbolizing the collective efforts towards fostering a more eco-friendly and interconnected campus environment.
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="containerImage" id="containerImage3">
                        <div class="tutorial">
                            {{-- <p id="containerImage"><br>Image</p> --}}
                        </div>
                    </div>
                    <div class="containerImage-word">
                        <p style="height: 100%; text-align: left; margin: 0;">
                            <br>
                            In the heart of Kolej Kediaman 4 at Universiti Malaysia Pahang Al-Sultan Abdullah (UMPSA), an organized spectacle is in the works as bicycles are meticulously lined up within the building. This strategic arrangement precedes the distribution phase, where these carefully checked and prepared bicycles will find their way into the hands of eager students. The last-minute check ensures that each bike is in optimal condition, guaranteeing a smooth and enjoyable riding experience for the recipients. As the bicycles stand in formation, ready for their new owners, the anticipation grows for a seamless distribution that will contribute to fostering a more sustainable and interconnected community within UMPSA.
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </center>
    {{-- </div> --}}

    <div class="footer">
        <div class="content-container">
            <h3><b>CONTACT US</b></h3>
            <p>Kolej Kediaman 4, Universiti Malaysia Pahang, 26300, Gambang, Pahang.</p>
            <p>Tel: +60122724073 (Pengarah Projek: Syahirurrafiq)</p>
            <p>E-mail: peka4@umpsa.edu.my</p>
        </div>
    </div>
@endsection
