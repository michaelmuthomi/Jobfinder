   
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
      $("#_profilepic :file").on('change', function()
      {
         var input = $(this).parents('.input-group').find(':text');
         input.val($(this).val());
      });
      $("#wb_DropdownMenu1").affix({offset:{top: $("#wb_DropdownMenu1").offset().top}});
   });
