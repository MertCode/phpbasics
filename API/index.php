<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>AI-Powered News!</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f0f0f0;
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .container {
         background-color: #fff;
         border-radius: 10px;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
         padding: 20px;
         max-width: 600px;
         width: 100%;
      }

      h1 {
         color: #333;
         margin-bottom: 20px;
         text-align: center;
      }

      p {
         color: #666;
         line-height: 1.6;
      }
   </style>
</head>

<body>

   <div class="container">
      <h1 class="mb-4">AI-Powered News Generator</h1>
      <button id="generateBtn" class="btn btn-primary btn-block">Generate News</button>
      <div id="summaryContainer" class="mt-4"></div>
   </div>

   <script>
      document.getElementById("generateBtn").addEventListener("click", function() {
         // Call the PHP script to fetch news summary
         fetch('news_summary.php')
            .then(response => response.text())
            .then(summary => {
               // Update the summary container with the fetched news summary
               document.getElementById("summaryContainer").innerHTML = summary;
            })
            .catch(error => console.error('Error fetching news summary:', error));
      });
   </script>

</body>

</html>