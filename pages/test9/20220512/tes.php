I want to reload a div on click of a button. I do not want to reload the full page.

Here is my code:

HTML:

<div role="button" class="marginTop50 marginBottom">
    <input type="button" id="getCameraSerialNumbers" value="Capture Again" class="disabled" />
    <input type="button" id="confirmNext"  value="Confirm & Proceed" class="disabled marginLeft50" />
</div>
On click of <input type="button" id="getCameraSerialNumbers" value="Capture Again"> Button a <div id="list">....</div> should reload without loading or refreshing full page.

Below is the Jquery which I tried, but not working:-

$("#getCameraSerialNumbers").click(function () {
$("#step1Content").load();
});
Please suggest.

Here is the DIV on my page, which contains Pictures and Serial numbers of some products... Which will be coming from database 1st time on the Page Load. But Is User faces some issue he'll click tthe "Capture Again" button "<input type="button" id="getCameraSerialNumbers" value="Capture Again">" which will load those information again.

The HTML Code of Div:-

<div id="step1Content" role="Step1ShowCameraCaptures" class="marginLeft">

    <form>
        <h1>Camera Configuration</h1>
        <!-- Step 1.1 - Image Captures Confirmation-->
        <div id="list">
            <div>
                <p>
                    <a id="pickheadImageLightBox" data-lightbox="image-1" title="" href="">
                        <img alt="" id="pickheadImage" src="" width="250" height="200" />
                    </a>
                </p>
                <p>
                    <strong>Pickhead Camera Serial No:</strong><br />
                    <span id="pickheadImageDetails"></span>
                </p>
            </div>
            <div>
                <p>
                    <a id="processingStationSideImageLightBox" data-lightbox="image-1" title="" href="">
                        <img alt="" id="processingStationSideImage" src="" width="250" height="200" />
                    </a>
                </p>
                <p>
                    <strong>Processing Station Top Camera Serial No:</strong><br />
                    <span id="processingStationSideImageDetails"></span>
                </p>
            </div>
            <div>
                <p>
                    <a id="processingStationTopImageLightBox" data-lightbox="image-1" title="" href="">
                        <img alt="" id="processingStationTopImage" src="" width="250" height="200" />
                    </a>
                </p>
                <p>
                    <strong>Processing Station Side Camera Serial No:</strong><br />
                    <span id="processingStationTopImageDetails"></span>
                </p>
            </div>
            <div>
                <p>
                    <a id="cardScanImageLightBox" data-lightbox="image-1" title="" href="">
                        <img alt="" id="cardScanImage" src="" width="250" height="200" />
                    </a>
                </p>
                <p>
                    <strong>Card Scan Camera Serial No:</strong><br />
                    <span id="cardScanImageDetails"></span>
                </p>

            </div>
        </div>
        <div class="clearall"></div>

        <div class="marginTop50">
            <p><input type="radio" name="radio1" id="optionYes" />Yes, the infomation captured is correct.</p>
            <p><input type="radio" name="radio1" id="optionNo" />No, Please capture again.</p>
        </div>
        <div role="button" class="marginTop50 marginBottom">
            <input type="button" id="getCameraSerialNumbers" value="Capture Again" class="disabled" />
            <input type="button" id="confirmNext"  value="Confirm & Proceed" class="disabled marginLeft50" />
        </div>
    </form>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(function(){
                $('#ideal_form').submit(function(e){
                    e.preventDefault();
                    var form = $(this);
                    var post_url = form.attr('action');
                    var post_data = form.serialize();
                    $('#loader3', form).html('<img src="../../images/ajax-loader.gif" />       Please wait...');
                    $.ajax({
                        type: 'POST',
                        url: post_url,
                        data: post_data,
                        success: function(msg) {
                            $(form).fadeOut(800, function(){
                                form.html(msg).fadeIn().delay(2000);

                            });
                        }
                    });
                });
            });
        });

    </script>