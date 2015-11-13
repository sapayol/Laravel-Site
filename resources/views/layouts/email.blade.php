<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>@yield('title')</title>

    <style type="text/css">
      @include('partials.emails.email-css');
    </style>

</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>

		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										<br><br>
										<a href="{{{ env('SITE_URL') }}}"><img src="https://sapayol.com/images/logo-black.svg" alt="SAPAYOL Logo" class="logo"></a>
										<br><br>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row1')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row2')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row3')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row4')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row5')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row6')
									</td>
								</tr>
								<tr>
									<td class="content-block">
										@yield('row7')
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block">@yield('footer')</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>
