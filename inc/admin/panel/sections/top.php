<?php 
	$theme_ver = wp_get_theme( get_template() );
	global $wpdb;
	$mysqlVersion = $wpdb->db_version();
?>

<h1>
    <?php echo '<strong>Welcome to '.Theme_Name.'</strong>'; ?>
</h1>
<div class="about-text">
<?php _e( 'Bản quyền của Saigontravel ® 2020. Bảo lưu mọi quyền.<br>Ghi rõ nguồn "www.sgtravel.vn" ® khi sử dụng lại thông tin từ website này.<br>Số giấy phép kinh doanh lữ hành Quốc tế: 79-234/2014/TCDL-GP LHQT' ); ?>
    <br><br>
</div>

<div class="wp-badge fl-badge">Version <?php echo $theme_ver['Version']; ?></div>

<div id="tab-activate" class="col cols panel flatsome-panel">
	<div class="inner-panel">
		<h3>Tài Nguyên</h3>
		<style>.license-table{width: 100%;} .license-table td{padding: 10px 0; border-bottom: 1px solid #eee;}</style>
		<table class="license-table">
			<tbody>
				<tr>
					<td><strong>Thông tin máy chủ</strong></td>
					<td><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></td>
				</tr>
				<tr>
					<td><strong>Phiên bản PHP</strong></td>
					<td><?php echo PHP_VERSION; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>