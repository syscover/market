<style>
	.white-popup-block {
		background: #FFF;
		padding: 20px 30px;
		text-align: left;
		max-width: 650px;
		margin: 40px auto;
		position: relative;
	}
	.mfp-close-btn-in .mfp-close {
		color: #333 !important;
	}
	button.mfp-arrow, button.mfp-close {
		overflow: visible;
		cursor: pointer;
		background: 0 0;
		border: 0;
		-webkit-appearance: none;
		display: block;
		outline: 0;
		padding: 0;
		z-index: 1046;
		-webkit-box-shadow: none;
		box-shadow: none;
	}
	.mfp-close {
		width: 44px;
		height: 44px;
		line-height: 44px;
		position: absolute;
		right: 0;
		top: 0;
		text-decoration: none;
		text-align: center;
		opacity: .65;
		filter: alpha(opacity=65);
		padding: 0 0 18px 10px;
		color: #FFF;
		font-style: normal;
		font-size: 28px;
		font-family: Arial,Baskerville,monospace;
	}
	ul.additional-list {
		margin: 0;
		padding: 30px 0;
		list-style: none;
	}
	ul.additional-list li {
		padding-left: 20px;
		margin-bottom: 15px;
	}
	.additional-list-label{
		font-weight: bold;
		padding-right: 15px;
	}
</style>
<div id="custom-content" class="white-popup-block">
	<h1>{{ trans('pulsar::pulsar.additional_information') }}</h1>
	@if(is_array($info))
		<ul class="additional-list">
		@foreach($info as $row)
			@if(isset($row['trans']) && isset($row['value']))
				<li><span class="additional-list-label">{{ $row['trans'] }}:</span> {{ is_array($row['value'])? implode($row['value'], ',') : $row['value'] }}</li>
			@endif
		@endforeach
		</ul>
	@endif
</div>