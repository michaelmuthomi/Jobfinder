   
   $(document).ready(function()
   {
      $("#Layer1").stickylayer({orientation: 3, position: [0, 0], delay: 0, keepOriginalPos: true});
      $("#DropList1").droplist(
      {
   
         classes: {'ui-selectmenu-menu':'DropList1'}
      });
      $("#DropList2").droplist(
      {
   
         classes: {'ui-selectmenu-menu':'DropList2'}
      });
      $("#DropList3").droplist(
      {
   
         classes: {'ui-selectmenu-menu':'DropList3'}
      });
   });
