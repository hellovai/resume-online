
    </div><!-- /container2 -->
    
    </div><!-- /container -->
</div><!-- /wrap -->
     <!-- Footer
      ================================================== -->
      

      <footer id="footer">
		<div class="container">
		<hr>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <div class="links">
          <a href="#" onclick="pageTracker._link(this.href); return false;">Blog</a>
          <a href="#">RSS</a>
          <a href="#">Twitter</a>
          <a href="#">Website</a>
          <a rel="tooltip" href="javascript:(function(e,a,g,h,f,c,b,d)%7Bif(!(f%3De.jQuery)%7C%7Cg%3Ef.fn.jquery%7C%7Ch(f))%7Bc%3Da.createElement(%22script%22)%3Bc.type%3D%22text/javascript%22%3Bc.src%3D%22http://ajax.googleapis.com/ajax/libs/jquery/%22%2Bg%2B%22/jquery.min.js%22%3Bc.onload%3Dc.onreadystatechange%3Dfunction()%7Bif(!b%26%26(!(d%3Dthis.readyState)%7C%7Cd%3D%3D%22loaded%22%7C%7Cd%3D%3D%22complete%22))%7Bh((f%3De.jQuery).noConflict(1),b%3D1)%3Bf(c).remove()%7D%7D%3Ba.documentElement.childNodes%5B0%5D.appendChild(c)%7D%7D)(window,document,%221.3.2%22,function(%24,L)%7Bif(%24(%22.bootswatcher%22)%5B0%5D)%7B%24(%22.bootswatcher%22).remove()%7Delse%7Bvar%20%24e%3D%24(%27%3Cselect%20class%3D%22bootswatcher%22%3E%3Coption%3EAmelia%3C/option%3E%3Coption%3ECerulean%3C/option%3E%3Coption%3ECosmo%3C/option%3E%3Coption%3ECyborg%3C/option%3E%3Coption%3EJournal%3C/option%3E%3Coption%3EReadable%3C/option%3E%3Coption%3ESimplex%3C/option%3E%3Coption%3ESlate%3C/option%3E%3Coption%3ESpacelab%3C/option%3E%3Coption%3ESpruce%3C/option%3E%3Coption%3ESuperhero%3C/option%3E%3Coption%3EUnited%3C/option%3E%3C/select%3E%27)%3Bvar%20l%3D1%2BMath.floor(Math.random()*%24e.children().length)%3B%24e.css(%7B%22z-index%22:%2299999%22,position:%22fixed%22,top:%225px%22,right:%225px%22,opacity:%220.5%22%7D).hover(function()%7B%24(this).css(%22opacity%22,%221%22)%7D,function()%7B%24(this).css(%22opacity%22,%220.5%22)%7D).change(function()%7Bif(!%24(%22link.bootswatcher%22)%5B0%5D)%7B%24(%22head%22).append(%27%3Clink%20rel%3D%22stylesheet%22%20class%3D%22bootswatcher%22%3E%27)%7D%24(%22link.bootswatcher%22).attr(%22href%22,%22http://bootswatch.com/%22%2B%24(this).find(%22:selected%22).text().toLowerCase()%2B%22/bootstrap.min.css%22)%7D).find(%22option:nth-child(%22%2Bl%2B%22)%22).attr(%22selected%22,%22selected%22).end().trigger(%22change%22)%3B%24(%22body%22).append(%24e)%7D%3B%7D)%3B" title="Drag to your bookmarks bar">Bookmarklet</a>
          <a href="#">Github</a>
          <a href="#">API</a>
          <a href="#">Donate</a>
        </div>
        Made by <a target="_blank" href="#" onclick="pageTracker._link(this.href); return false;">Team</a>. Contact him <a href="#">Email</a>.<br/>
	    </div><!-- /container -->
      </footer>




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/application.js"></script>
    <script src="<?php echo base_url() ?>js/bootswatch.js"></script>
    <script src="<?php echo base_url() ?>js/extras.js"></script>
	<script>
		$(document).ready(function() {
			$(".fixed-height").mousemove(function(e){
				var h = $(this).height()*1.1;
				var offset = $(this).offset();
				var position = (e.pageY-offset.top)/h;
				if(position<0.10) {
				    $(this).stop().animate({ scrollTop: 0 }, 250);
				}
				if(position>0.90) {
				    $(this).stop().animate({ scrollTop: h }, 250);
				}
			});
			$("i").hover(
			  function () {
				$(this).addClass("icon-white");
			  },
			  function () {
				$(this).removeClass("icon-white");
			  }
			);
			$(confirmDelete());
			$('input[rel="tooltip"]').tooltip({trigger:'focus', placement:'right', html:'true'});
			$('textarea[rel="tooltip"]').tooltip({trigger:'focus', placement:'right', html:'true'});
    	});
	</script>
	
	    
  </body>
</html>
