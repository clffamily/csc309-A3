<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Example of Twitter Bootstrap 3 Popover</title>

<script type="text/javascript">
$(document).ready(function(){
	$('#ha').tooltip('show');
	$('#img').tooltip('show');
	$('#elem').popover();
	//$('#img1').popover();
    $(".popover-examples a").popover({
        placement : 'top'
    });

    $("#example").popover({
        placement: 'bottom',
        html: 'true',
        title : '<span class="text-info"><strong>title</strong></span>'+
                '<button type="button" id="close" class="close" onclick="$(&quot;#example&quot;).popover(&quot;hide&quot;);">&times;</button>',
        content : 'test'
    });
});
</script>
<style type="text/css">
	.bs-example{
    	margin: 150px 50px;
    }
</style>
</head>
<body>

<button id = "ha" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-content="Default popover">Tooltip on top</button>
<div class="well">
    <a id="elem" href="#" class="btn btn-danger" rel="popover" data-original-title="Example Popover" data-content="Readymade terry richardson fap iphone skateboard. Lomo fixie pop-up, whatever pickled pour-over keytar selvage godard.">hover for popover</a>
</div>

<img id = "img" src="http://www.photosnewhd.com/media/images/picture.jpg" alt="The official HTML5 Icon" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
<img id = "img1" src="http://www.photosnewhd.com/media/images/picture.jpg" alt="The official HTML5 Icon" data-toggle="popover" data-placement="top" title="Tooltip on top" data-trigger="hover">
<button type="button" id="example" class="btn btn-primary">example</button>
<div class="bs-example"> 
    <ul class="popover-examples list-inline"> 
    	
        <li><a href="#" class="btn btn-primary" data-toggle="popover" title="Popover title" data-content="Default popover">Popover</a></li>
        <li><a href="#" class="btn btn-success" data-toggle="popover" title="Popover title" data-content="Another popover">Another popover</a></li>
        <li><a href="#" class="btn btn-info" data-toggle="popover" title="Popover title" data-content="A larger popover to demonstrate the max-width of the Bootstrap popover.">Large popover</a></li>
        <li><a href="#" class="btn btn-warning" data-toggle="popover" title="Popover title" data-content="The last tip!">Last popover</a></li>
    </ul>
</div>
</body>
</html>     