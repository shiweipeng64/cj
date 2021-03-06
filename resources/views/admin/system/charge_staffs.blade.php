	<div class="charge-staffs-index">
		<link href="/admin/vendors/searchableSelect/jquery.searchableSelect.css" rel="stylesheet">
		<div class="row">
		
        </div>
               <!-- table content -->
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>收费员管理</h2>
					
                    <div class="clearfix"></div>
                    
					<button type="button" class="btn btn-success btn-xs btn-add">添加</button>
					
                  </div>
				  
				  <!-- search start -->
				  <!--
					<form id="form-search">
					<div class="btn-group focus-btn-group">
						<label for="sys_order_num">订单号
							  <input type="text" id="sys_order_num" class="form-control form-controlNew" name="filter[sys_order_num]"/>
						</label>
						
					</div>
					
					<div class="btn-group focus-btn-group">
						<label for="fullname">查找
						<button type="button" class="form-control form-controlNew btn btn-primary btn-sm search-btn"><i class="fa fa-search"></i></button>
						</label>
					</div>
					</form>-->
					<!-- search end -->
                  <div class="x_content">
					
                    <table id="datatable" class="table table-striped table-bordered">
						<colgroup>
							@foreach ($rows as $key => $row)
							@if ($row['show'])
							<col width="{{$row['width']}}">
							@endif
							@endforeach
						</colgroup>
						<thead>
						<tr>
							@foreach ($rows as $key => $row)
							@if ($row['show'])
							<th>{{$row['name']}}</th>
							@endif
							@endforeach
						</tr>
						</thead>
						<!-- ajax加载 -->
                      <tbody>
						
                      </tbody>
                    </table>
					<div id="AiGrid"><!-- 分页插件 --></div>
					
					<!-- 订单列表HTML模板 -->
					<script type="text/template" id="table_template">
						<tr>
							<td>{id}</td>
							<td>{name}</td>
							<td>{terminal_key}</td>
							<td>{username}</td>
							<td>{city_name}/{district_name}/{team_name}</td>
							<td>{charge_staff_type_str}</td>
							<td>{clear_money_rate}</td>
							<td>{status_alias}</td>
							<td>{join_time}</td>
							<td>
								<button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
								<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
								<button type="button" dataid="{id}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o">删除</i></button>
							</td>
						</tr>
					</script>
                  </div>
				  
				  <!-- 删除 modal -->
				  <div id="delete-info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog"  style="width:30%">
						<div class="modal-content">
													
							<div class="modal-body">
								确定要删除该信息么？
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">取消</button>
								<button type="button" _id="" class="btn btn-primary btn-delete-sure">确定</button>
							 </div>
							 
						</div>
					</div>
				  </div>
				  
				  <!-- 修改详情 modal -->
				  <div id="edit-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog"  style="width:30%">
					<div class="modal-content">

					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel2"></h4>
					  </div>
					  <div class="modal-body">
						
					
						<div id="testmodal2" style="padding: 5px 20px;">
							<input type="hidden" class="form-control form-controlNew" id="id" name="id" value="">
							
						<form id="dataform" class="form-horizontal data-form" role="form">
							<!-- CSRF TOKEN -->
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">收费员名称<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="name" placeholder="不超过16位的字母数字或汉字" data-rule-maxlength='16' data-msg-maxlength='字符长度不能超过16' data-rule-required="true" data-msg-required="请填写名称">
								
								</div>
								<div class="col-sm-6">
									<label class="control-label">终端<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew terminal-search" >
									<select name="terminal_id" class="form-control form-controlNew terminal-search-list">
										<option value="0:-">请选择</option>
									</select>
								</div>
							 
							</div>
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">收费员账号<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="username" placeholder="不超过16位的字母数字或下划线" data-rule-maxlength='16' data-msg-maxlength='字符长度不能超过16' data-rule-required="true" data-msg-required="请填写账号">

								</div>
								<div class="col-sm-6">
									<label class="control-label">收费员密码</label>
									<input type="text" class="form-control form-controlNew" name="password" placeholder="6~12位的字母数字" data-rule-rangelength='6,12' data-msg-rangelength='字符长度需在6~12位之间'>

								</div>								
							 
							</div>
							
							<div class="form-group qrcode">
							
								<div class="col-sm-6">
									<label class="control-label">二维码</label>
									<img class="charge-qrcode" src="" width="300">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-4">
									<label class="control-label">归属省</label>
									<select name="province_id" class="form-control form-controlNew detail-province">
										@if(isset($district_result['province']))
											@foreach ($district_result['province'] as $k => $val)
											<option value="{{$k}}">{{$val['districts_name']}}</option>
											@endforeach
										@endif
									</select>
									<input type="hidden" class="form-control form-controlNew detail-provincename" name="province_name" value="">
								</div>
								<div class="col-sm-4">
									<label class="control-label">归属市</label>
									<select name="city_id" class="form-control form-controlNew detail-city">
										<option value="0">请选择</option>
										@if(isset($district_result['city']))
											@foreach ($district_result['city'] as $k => $val)
											<option value="{{$k}}">{{$val['districts_name']}}</option>
											@endforeach
										@endif
									</select>
									<input type="hidden" class="form-control form-controlNew detail-cityname" name="city_name" value="">
								</div>
								<div class="col-sm-4">
									<label class="control-label">归属区县</label>
									<select name="district_id" class="form-control form-controlNew detail-district">
										<option value="0">请选择</option>								
									</select>
									<input type="hidden" class="form-control form-controlNew" name="district_name" value="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label">归属营业厅</label>
									<select name="team_id" class="form-control form-controlNew detail-team">
										<option value="0">请选择</option>					
									</select>
									<input type="hidden" class="form-control form-controlNew" name="team_name" value="">
								</div>
								<div class="col-sm-6">
									<label class="control-label">加入时间<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" placeholder="2000-01-01" name="join_time" data-rule-required='true' data-msg-required='请输入加入时间' value="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6">
									<label class="control-label">结算费率<span class="required">*</span>(最多精确到小数点后两位)</label>
									<input type="text" class="form-control form-controlNew" name="clear_money_rate" placeholder="0~100之间的数字" data-rule-required='true' data-msg-required='请输入结算费率'>

								</div>
							
								<div class="col-sm-3">
									<label class="control-label">收费员类型<span class="required">*</span></label>
										<select name="charge_staff_type" class="form-control form-controlNew">
											@foreach($staff_type_list as $k=>$val)
											<option value='{{$k}}'>{{$val}}</option>
											@endforeach
										</select>
								</div>
								
								<div class="col-sm-3">
									<label class="control-label">状态<span class="required">*</span></label>
									<select name="status" class="form-control form-controlNew">
										<option value="1">正常</option>
										<option value="2">休假</option>
										<option value="3">离职</option>										
									</select>
								</div>
							</div>

						  </form>
						</div>
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
						<button type="button" class="btn btn-primary btn-save">保存</button>
					  </div>
					</div>
				  </div>
				</div>				
                </div>
              </div>
            </div>
			<script>
				var $city     = JSON.parse('{!! json_encode($district_result['city'],JSON_UNESCAPED_UNICODE) !!}');
				var $district = JSON.parse('{!! json_encode($district_result['district'],JSON_UNESCAPED_UNICODE) !!}');
				var $team     = JSON.parse('{!! json_encode($district_result['team'],JSON_UNESCAPED_UNICODE) !!}');
				
			</script>
			<script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
			<script src="/admin/adminJS/system/charge_staffs_index.js"></script> 
		
	</div>

       
