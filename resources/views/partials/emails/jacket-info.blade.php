<h3>Jacket Info</h3>
<br>
<ul style="list-style: none; margin-left: 0; padding-left: 0;">
	<li><small style="font-size: 85%; display: inline-block; min-width: 90px;">Model</small><strong>{{{ ucfirst($order->jacket->name)  }}}	</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 90px;">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 90px;">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 90px;">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 90px;">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
</ul>
