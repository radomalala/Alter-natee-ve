<div id="search-product">
  
  <div class="input-group">
    
  
  <form action="search_store" method="post">
    <div class="form-group">
      <label for="zip">Zip Code:</label>
      <input type="text" class="form-control" id="code" placeholder="zip code" name="zip">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    </div> 
    <div class="form-group">
      <label for="sel1">Distance:</label>
      <select class="form-control" name="filtre">
      <option value="5">5 Km</option>
      <option value="10">10 Km</option>
      <option value="15">15 Km</option>
      <option value="35">35 Km</option>
      <option value="50">50 Km</option>
      <option value="100">100 Km</option>
     </select>
   </div> 
   <div>
     
      <input type="submit" name="Submit" value="search" />

   </div>
    
  </form>

  

</div>
</div>