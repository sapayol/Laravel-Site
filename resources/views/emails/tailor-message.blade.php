@extends('layouts/email')

@section('title')
Sapayol Jacket Order: {{{ $order->id }}}
@stop

@section('main')

<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
	<tr>
		<td align="left" valign="top">
			<table border="0" cellpadding="20" cellspacing="0" width="400">
				@if (isset($note))
					<tr>
						<td>
							{{{ $note }}}
						</td>
					</tr>
				@endif
				{{----------------------------------------------------------------------------------}}
				{{--                                  ORDER INFO                                    }}
				{{----------------------------------------------------------------------------------}}
				<tr>
					<td align="left" valign="top">
						<table border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td width="35%"><small>Order #</small></td>
								<td>{{{ $order->id }}}</td>
							</tr>
							<tr>
								<td width="35%"><small>Placed On:</small></td>
								<td>{{{ date('Y-m-d h:i', strtotime($order->paid_at)) }}}</td>
							</tr>
						</table>
					</td>
				</tr>

				{{----------------------------------------------------------------------------------}}
				{{--                                     LOOK                                       }}
				{{----------------------------------------------------------------------------------}}
				<tr>
					<td align="left" valign="top">
						@if (isset($inclusions['look']))
						<table width="100%" class="value-list-table">
							<tbody>
								<tr>
									<td width="35%"><small>Model</small></td>
									<td><strong>{{{ ucwords($order->jacket->name) }}}</strong></td>
								</tr>
								<tr>
									<td width="35%"><small>Leather Type</small></td>
									<td><strong>{{{ ucwords($order->leather_type()->name) }}}</strong></td>
								</tr>
								<tr>
									<td width="35%"><small>Leather Color</small></td>
									<td><strong>{{{ ucwords($order->leather_color()->name) }}}</strong></td>
								</tr>
								<tr>
									<td width="35%"><small>Lining Color</small></td>
									<td><strong>{{{ ucwords($order->lining_color()->name) }}}</strong></td>
								</tr>
								<tr>
									<td width="35%"><small>Hardware Color</small></td>
									<td><strong>{{{ ucwords($order->hardware_color()->name) }}}</strong></td>
								</tr>
							</tbody>
						</table>
						@endif
					</td>
				</tr>
				<tr>
					<td>
						<table width="100%">
							<tr>
								{{----------------------------------------------------------------------------------}}
								{{--                               BODY MEASUREMENTS                                }}
								{{----------------------------------------------------------------------------------}}
								<td align="left" valign="top">
									@if (isset($inclusions['product_fit']))
									<table width="100%" class="value-list-table">
										<caption>Body <br> Measurements</caption>
										<tbody>
											@foreach ($order->productMeasurements->measurement_names as $name)
											<tr>
												<td><small>{{{ ucwords(str_replace('_', ' ', $name)) }}}</small></td>
												<td><strong>{{{ $order->bodyMeasurements->$name }}}12.3 "</strong></td>
											</tr>
											@endforeach
										</tbody>
									</table>
									@endif
								</td>

								{{----------------------------------------------------------------------------------}}
								{{--                              PRODUCT MEASUREMENTS                              }}
								{{----------------------------------------------------------------------------------}}
								<td align="left" valign="top">
									@if (isset($inclusions['product_fit']))
									<table width="100%" class="value-list-table">
										<caption>Product <br>Measurements</caption>
										<tbody>
											@foreach ($order->productMeasurements->measurement_names as $name)
											<tr>
												<td><small>{{{ ucwords(str_replace('_', ' ', $name)) }}}</small></td>
												<td><strong>{{{ $order->bodyMeasurements->$name }}}45 cm</strong></td>
											</tr>
											@endforeach
										</tbody>
									</table>
									@endif
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

@stop