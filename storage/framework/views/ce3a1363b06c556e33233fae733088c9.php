<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0 !important;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
            overflow: hidden !important;
        }

        .error-page {
            min-height: 100vh;
            background:#21285A;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center !important;
            overflow: hidden !important;
        }

        .error-container {
            max-width: 600px;
        }

        .error-code {
            font-size: 12rem;
            font-weight: 900;
            background: linear-gradient(to right, #fff, rgba(255, 255, 255, 0.5));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: pulse 2s infinite;
            margin: 0 !important;
            line-height: 1;
        }

        .error-container h2 {
            font-size: 2.5rem;
            margin-top: 0;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-container p {
            font-size: 1.25rem;
            font-weight: 300;
            margin-top: 0;
            color: rgba(255, 255, 255, 0.9);
        }

        .error-message {
            color: rgba(255, 255, 255, 0.9);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            transition: all 0.3s ease;
            padding: 15px 30px;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        @media screen and (max-width:600px) {
            .error-code {
                font-size: 7rem;
            }

            .error-container h2 {
                font-size: 25px;
                margin-top: 10px;
            }

            .error-container p {
                font-size: 15px;
                width: 80%;
                margin: 0 auto 15px;

            }

            .btn-glass {
                padding: 12px 20px;
                font-size: 14px;

            }
        }
    </style>
</head>

<body>
    <div class="error-page ">
        <div class="error-container ">
            <h1 class="error-code">404</h1>
            <h2 class=" ">Page Not Found</h2>
            <p class="">We can't seem to find the page you're looking for.</p>
            <a href="<?php echo e(url('/')); ?>"><button class="btn btn-glass px-4 py-2">
                    Return Home
                </button></a>
        </div>
    </div>

</body>

</html><?php /**PATH /Users/jal/Herd/bookmark/resources/views/website/errors/404.blade.php ENDPATH**/ ?>