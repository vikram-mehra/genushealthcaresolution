<!-- pdf-view.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc Viewer</title>
   <style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0); /* Make the overlay transparent */
        pointer-events: none; /* Allow click-through */
    }
   </style>
    
<script>
    window.addEventListener('contextmenu', function (e) {
        // Prevent the default right-click behavior
        e.preventDefault();
    });

    window.addEventListener('load', function() {
    var overlay = document.getElementById('overlay');
    overlay.style.backgroundColor = 'rgba(0, 0, 0, 0)'; // Make the overlay visible
    overlay.style.pointerEvents = 'auto'; // Prevent click-through
});
</script>
</head>
<body>
<div id="overlay"></div>
    <iframe src="{{ url('/public/')}}/{{$doc}}#toolbar=0" width="100%" height="1200px"  ></iframe>
</body>
</html>
