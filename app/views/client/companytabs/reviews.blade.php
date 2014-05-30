<div id="company-tabs-custom" class="company-tabs-content" style="display: none;">
    <div class="portfolio-container container-24">
        <img src="http://www.irishbusiness.ie/images/novatel_coupon.png" alt="coupon">



        <p><a href="https://www.facebook.com/sharer/sharer.php?u=http://irishbusiness.ie/images/novatel_coupon.png" class="share facebook">Share on Facebook</a></p><p><a href="https://twitter.com/intent/tweet?url=http://irishbusiness.ie/images/novatel_coupon.png&amp;text=Deal+Voucher+Coupon&amp;hashtags=Deal,Voucher,Coupon" class="share twitter">Share on Twitter</a></p><p><a href="https://plus.google.com/share?url=http://irishbusiness.ie/images/novatel_coupon.png" class="share google">Share on Google+</a></p><p><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://irishbusiness.ie/images/novatel_coupon.png&amp;source=IrishBusiness.ie&amp;title=Deal+Voucher+Coupon" class="share linkedin">Share on LinkedIn</a></p>
        <script>
            // create social networking pop-ups
            (function() {

                var Config = {
                    Link: "a.share",
                    Width: 500,
                    Height: 500
                };

                // add handler links
                var slink = document.querySelectorAll(Config.Link);
                for (var a = 0; a < slink.length; a++) {
                    slink[a].onclick = PopupHandler;
                }

                // create popup
                function PopupHandler(e) {

                    e = (e ? e : window.event);
                    var t = (e.target ? e.target : e.srcElement);

                    // popup position
                    var
                        px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
                        py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);

                    // open popup
                    var popup = window.open(t.href, "social", "width="+Config.Width+",height="+Config.Height+",left="+px+",top="+py+",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
                    if (popup) {
                        popup.focus();
                        if (e.preventDefault) e.preventDefault();
                        e.returnValue = false;
                    }

                    return !!popup;
                }

            }());
        </script>
    </div>
</div>