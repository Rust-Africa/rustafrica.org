jQuery(document).ready(function($){
  	var w_width = $(this).width() / 2;
    var w_height = $(this).height() / 2;
    $('.elementor-section-wrap > .elementor-element').each(function(){
      $(this).bind('mousemove',function(e){
        if(e.pageX >= w_width){
          $(this).find('.shape-parallax').each(function(){
            var speed = $(this).attr('data-speed');
            var move_x = $(this).attr('data-move');
            
            speed = (speed != undefined && speed != '') ? speed : 5 ;
            move_x = (move_x != undefined && move_x != '') ? move_x : 40 ;
            
            var move_y = (w_height >= e.pageY) ? -5 : +5 ;
            
            LaxMoving($(this), -move_x, move_y, speed);
          });
        } else {
         	$(this).find('.shape-parallax').each(function(){
            var speed = $(this).attr('data-speed');
            var move_x = $(this).attr('data-move');
            
            speed = (speed != undefined && speed != '') ? speed : 5 ;
            move_x = (move_x != undefined && move_x != '') ? move_x : 40 ;
             
            var move_y = (w_height <= e.pageY) ? -5 : +5 ;
             
            LaxMoving($(this), move_x, move_y, speed);
          });
        }
      });
      function LaxMoving(selector, move_x, move_y, speed){
          selector.css({
            'transform': 'translate('+move_x+'px,'+move_y+'px)',
            '-webkit-transform': 'translate('+move_x+'px,'+move_y+'px)',
            '-o-transform': 'translate('+move_x+'px,'+move_y+'px)',
            '-moz-transform': 'translate('+move_x+'px,'+move_y+'px)',
            '-webkit-transition' : 'all ' + speed + 's ease-out',
            '-moz-transition' : 'all ' + speed + 's ease-out',
            '-o-transition' : 'all ' + speed + 's ease-out',
            'transition' : 'all ' + speed + 's ease-out',
            'animation-name' : 'inherit',
            '-webkit-animation-name' : 'inherit',
            '-ms-animation-name' : 'inherit',
            '-o-animation-name' : 'inherit',
           });
      }
    });
});