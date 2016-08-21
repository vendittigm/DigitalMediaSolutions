<html>
  <head>
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <title>MyIMDB Web App</title>
  <link href="myimdb.css" rel="stylesheet" type="text/css" />
  <script>

  var array = new Array();

  function insert(val){
  array[array.length]=val;
  }

  function show() {
  var string="<b>My List of Favorites:</b><br><br>";
  for(i = 0; i < array.length; i++) {
  string =string+array[i]+"<br>";
  }
  if(array.length > 0)
 document.getElementById('myDiv').innerHTML = string;
  }
  </script>
  </head>
  
  <body>
  <h2>MyIMDB Web App</h2>
  <p class="bodycopy">Add your favorite movie, character or actor to your list by entering them in the box below:</p>
  <form name="form1">
  <table width="400">
  <tr>
  <td width="25" align="left"><p class="bodycopy">Enter it here:</p>
  <td width="375">
  <input type="text" name="name" style="box-shadow: 1px 0px 1px #272727;"/>
  </tr>
  <tr>
  <td width="175" align="right">
  <td width="225">
<input type="button" class="btn-add" Value="Add It!" 
 onclick="insert(this.form.name.value),show();"/>
  </tr>
  </table>
  </form>
  <div id="myDiv"></div>
 <hr class="style-one">
  <h2>Search for movies and more!</h2>
    <input id="searchterm" style="margin-left: 25px; padding-left: 5px; box-shadow: 1px 0px 1px #272727;" />
    <button id="search" class="btn-search">Find It!</button>
    <div id="results">
</div>
 <hr class="style-one">
<script>
      $("#searchterm").keyup(function(e){
        var q = $("#searchterm").val();
        $.getJSON("http://en.wikipedia.org/w/api.php?callback=?",
        {
          srsearch: q,
          action: "query",
          list: "search",
          format: "json"
        },
        function(data) {
          $("#results").empty();
          $("#results").append("<p>Results for <b>" + q + "</b></p>");
          $.each(data.query.search, function(i,item){
            $("#results").append("<div><a href='http://en.wikipedia.org/wiki/" + encodeURIComponent(item.title) + "'>" + item.title + "</a><br>" + item.snippet + "<br><br></div>");
          });
        });
      });
    </script>

  </body>
</html>