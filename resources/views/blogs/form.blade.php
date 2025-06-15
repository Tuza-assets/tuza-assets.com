<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .btn {
            background: #2ecc71;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rich Text Editor</h1>
        <form action="" method="POST">
            <div class="form-group">
                <textarea id="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>

  