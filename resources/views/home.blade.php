@extends('header')
@section('content')

<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="grid row">
                    <div class="grid_item">
                        <img src="img/demo_img/1.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item grid-item--width2 ">
                        <img src="img/demo_img/2.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/3.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/4.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/5.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/6.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/7.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/8.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/9.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/10.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/11.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/12.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/13.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/14.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/15.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/16.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/17.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/18.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/19.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/20.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/21.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/22.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/23.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/24.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/25.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/26.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/27.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/28.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/29.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/30.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/31.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/32.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/33.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/34.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/35.jpg" class="img-responsive center-block">
                    </div>
                    <div class="grid_item">
                        <img src="img/demo_img/36.jpg" class="img-responsive center-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {

    //   var $boxes = $('.box');
    //   $boxes.hide();

    //   var $container = $('#post-area');
    //   $container.imagesLoaded( function() {
    //     $boxes.fadeIn();

    //     $container.masonry({
    //         itemSelector : '.box',
    //         columnwidth: 300,
    //         gutter: 20,
    //         isFitWidth: true,
    //         isAnimated: !Modernizr.csstransitions
    //     });    
    //   });
    // });
    // init Masonry
    var $grid = $('.grid').masonry({
      // options...
        itemSelector : '.grid_item',
        columnwidth: 300
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function() {
      $grid.masonry('layout');
    });
</script>

@endsection