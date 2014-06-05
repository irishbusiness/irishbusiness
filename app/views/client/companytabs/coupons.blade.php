<div id="company-tabs-coupon" class="company-tabs-content" style="display: none;">
    <div class="portfolio-container container-24">
<div class="preview" >
    	<img src="{{ Request::root().'/'}}scripts/server-side.php" />
    </div>
    
    <form id="realtime-form" action="#" method="post">
    	<fieldset>
    		<legend>Business Card Builder Form</legend>
    		<ol>
    			<li class="left">
    				<fieldset>
    					<legend class="accessibility">Company Information</legend>
    					<ol>
    						<li>
    							<label for="company-name">Company name:</label>
    							<input type="text" id="company-name" name="companyName" value="Company Name" />
    						</li>
    						<li>
    							<label for="company-slogan">Company slogan:</label>
    							<input type="text" id="company-slogan" name="companySlogan" value="Company Slogan" />
    						</li>
    						<li>
    							<label for="business-address">Business address</label>
    							<textarea id="business-address" name="businessAddress">1234 Main Street
Suite 101
City, ST 12345</textarea>
    						</li>
    					</ol>
    				</fieldset>
    			</li>
    			<li class="right">
    				<fieldset>
    					<legend class="accessibility">Contact Information and Description</legend>
    					<ol>
    						<li>
    							<label for="full-name">Full name:</label>
    							<input type="text" id="full-name" name="fullName" value="John Smith" />
    						</li>
    						<li>
    							<label for="job-title">Job title</label>
    							<input type="text" id="job-title" name="jobTitle" value="Job Title" />
    						</li>
    						<li>
    							<label for="primary-phone">Primary phone</label>
    							<input type="text" id="primary-phone" name="phoneOne" value="P: 954-555-1234" />
    						</li>
    						<li>
    							<label for="secondary-phone">Secondary phone</label>
    							<input type="text" id="secondary-phone" name="phoneTwo" value="P: 954-555-5678" />
    						</li>
    						<li>
    							<label for="email-address">Email address</label>
    							<input type="text" id="email-address" name="emailAddress" value="john@company.com" />
    						</li>
    						<li>
    							<label for="web-address">Web address</label>
    							<input type="text" id="web-address" name="siteUrl" value="websiteurl.com" />
    						</li>
    					</ol>
    				</fieldset>
    			</li> 
    		</ol>
    	</fieldset>
    </form>
	<button id="getResults">Give me my url!</button>
 	<div id="link">
		<input type="text" value="" id="resultsUrl" />
 	</div>
    </div>
    </div>