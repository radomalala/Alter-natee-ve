
	<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-body">
	                <div role="tabpanel">
	                    <!-- Nav tabs -->
	                    <ul class="nav nav-tabs" role="tablist">
	                        <li role="presentation" class="active"><a href="#uploadTab" aria-controls="uploadTab" role="tab" data-toggle="tab" id="head-tab-signing">{!! trans("common/label.login_title")!!}</a>

	                        </li>
	                        <li role="presentation"><a href="#browseTab" aria-controls="browseTab" role="tab" data-toggle="tab" id="head-tab-register">{!! trans("common/label.register_title")!!}</a>

	                        </li>
	                    </ul>
	                    <!-- Tab panes -->
	                    <div class="tab-content">
	                        <div role="tabpanel" class="tab-pane active" id="uploadTab">
	                        	@include('front.auth.login_popup', ['role_id' => 1])
	                        </div>
	                        <div role="tabpanel" class="tab-pane" id="browseTab">
	                        	@include('front.auth.register_popup', ['role_id' => 1])
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>