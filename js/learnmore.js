   
   document.addEventListener('DOMContentLoaded', function(event)
   {
      var DropdownMenu1_dropdownToggle = document.querySelectorAll('#DropdownMenu1 .dropdown-toggle');
      DropdownMenu1_dropdownToggle.forEach(item => 
      {
         var dropdown = new bootstrap.Dropdown(item, {popperConfig:{placement:item.getAttribute('data-bs-placement')}});
      });
      var DropdownMenu1_dropdown = document.querySelectorAll('#DropdownMenu1 .dropdown');
      DropdownMenu1_dropdown.forEach(item => 
      {
         item.addEventListener('shown.bs.dropdown', function(e)
         {
            e.currentTarget.classList.add('show');
         });
         item.addEventListener('hidden.bs.dropdown', function(e)
         {
            e.currentTarget.classList.remove('show');
         });
      });
      $("#wb_DropdownMenu1").affix({offset:{top: $("#wb_DropdownMenu1").offset().top}});
   });
   
   $(document).ready(function()
   {
      function resizeVideo() 
      {
         var ratio = 16/9;
         var widthViewPort = $(window).width();
         var heightViewPort = $(window).height();
         var width, height;
         var $player = $('#MediaPlayer1');
         if (widthViewPort / ratio < heightViewPort)
         {
            width = Math.ceil(heightViewPort * ratio);
            $player.width(width).height(heightViewPort).css({left: (widthViewPort - width) / 2, top: 0});
         }
         else
         {
            height = Math.ceil(widthViewPort / ratio);
            $player.width(widthViewPort).height(height).css({left: 0, top: (heightViewPort - height) / 2});
         }
      }
      $(window).on('resize', function() 
      {
         resizeVideo();
      })
      resizeVideo();
      $("#wb_DropdownMenu1").affix({offset:{top: $("#wb_DropdownMenu1").offset().top}});
   });
