<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>@yield('title')</title>
    <style>
			body {
				font-family: 'HelveticaNeue', 'Helvetica', 'Arial', 'sans-serif';
			}
			small {
				font-size: 70%;
			}
			table caption {
				font-size: 18px;
				text-align: left;
				margin-bottom: 16px;
			}
			.value-list-table td {
				padding: 4px 0;
			}
    </style>
  </head>
  <body>

		@yield('main');

	</body>
</html>