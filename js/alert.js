   
   $(document).ready(function()
   {
      $('#wb_popup').addClass('visibility-hidden');
      $('#wb_message').addClass('visibility-hidden');
      $('#wb_close').addClass('visibility-hidden');
      function onScrollpopup()
      {
         var $obj = $("#wb_popup");
         if (!$obj.hasClass("in-viewport") && $obj.inViewPort(true))
         {
            $obj.addClass("in-viewport");
            AnimateCss('wb_popup', 'slide-right-in', 0, 1250);
         }
         else
         if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
         {
            $obj.removeClass("in-viewport");
            AnimateCss('wb_popup', 'animate-fade-out', 0, 0);
         }
      }
      if (!$('#wb_popup').inViewPort(true))
      {
         $('#wb_popup').addClass("in-viewport");
      }
      onScrollpopup();
      $(window).scroll(function(event)
      {
         onScrollpopup();
      });
      function onScrollmessage()
      {
         var $obj = $("#wb_message");
         if (!$obj.hasClass("in-viewport") && $obj.inViewPort(true))
         {
            $obj.addClass("in-viewport");
            AnimateCss('wb_message', 'slide-right-in', 0, 1250);
         }
         else
         if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
         {
            $obj.removeClass("in-viewport");
            AnimateCss('wb_message', 'animate-fade-out', 0, 0);
         }
      }
      if (!$('#wb_message').inViewPort(true))
      {
         $('#wb_message').addClass("in-viewport");
      }
      onScrollmessage();
      $(window).scroll(function(event)
      {
         onScrollmessage();
      });
      function onScrollclose()
      {
         var $obj = $("#wb_close");
         if (!$obj.hasClass("in-viewport") && $obj.inViewPort(true))
         {
            $obj.addClass("in-viewport");
            AnimateCss('wb_close', 'slide-right-in', 0, 1250);
         }
         else
         if ($obj.hasClass("in-viewport") && !$obj.inViewPort(true))
         {
            $obj.removeClass("in-viewport");
            AnimateCss('wb_close', 'animate-fade-out', 0, 0);
         }
      }
      if (!$('#wb_close').inViewPort(true))
      {
         $('#wb_close').addClass("in-viewport");
      }
      onScrollclose();
      $(window).scroll(function(event)
      {
         onScrollclose();
      });
   });
