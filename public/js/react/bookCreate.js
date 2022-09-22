const Ecommerce = props => {
  return props.bookDetails.map((val, idx) => {
    let apiname = `apiname-${idx}`,
      apipath = `apipath-${idx}`,
      client_id = `client_id-${idx}`,
      system = `system-${idx}`,
      client_secret = `client_secret-${idx}`,
      api_type=`api_type-${idx}`,
      access_token=`access_token-${idx}`,
      comment=`comment-${idx}`,
      platform=`platform-${idx}`,
      plattext=`Platform ${idx+1}`;

    return (
      
      <div className="form-row" key={val.index}>
       <h4 className="panel-heading">{plattext}</h4>
         {idx === 0 ? (
        <span>
        </span>
        ) : (
          <button className="btn btn-danger delete-sec" onClick={() => props.delete(val)}><i className="fa fa-close" aria-hidden="true" /></button> 

        )}

   <div className="form-group">
			<label className="col-sm-3 control-label">System</label>
			<div className="col-sm-9">	
				<select className="form-control" required name="system" id={system} data-id={idx}>
				<option value="">Select System</option>
					<option value="Production">Production</option>
					<option value="Staging">Staging</option>
					<option value="Devlopment">Devlopment</option>
				</select>
			</div>	 
        </div>
        <div className="form-group">
			<label className="col-sm-3 control-label">Ecommerce Platform</label>
			<div className="col-sm-9">	
				<select className="form-control" required name="platform" id={platform} data-id={idx}>
					<option value="">Select Platform</option>
					<option value="magento">Magento</option>
					<option value="shopify">Shopify</option>
					<option value="ecommenrce">ecommenrce</option>
				</select>
			 </div>
        </div>
        <div className="form-group">
			<label className="col-sm-3 control-label">API Type</label>
			<div className="col-sm-9">	
				<input type="text" className="form-control required" placeholder="API Type" name="api_type" data-id={idx} id={api_type} required />
			</div>
		</div>
        <div className="form-group">
          <label className="col-sm-3 control-label">API Name</label>
          <div className="col-sm-9">
		  <input type="text" className="form-control" placeholder="API Name" name="apiname" id={apiname} data-id={idx} required />
			</div>    
        </div>    
        <div className="form-group">
          <label className="col-sm-3 control-label">API Path</label>
          <div className="col-sm-9">
		  <input type="text" className="form-control required" placeholder="API Path" name="apipath" id={apipath} data-id={idx} required />
        </div>   
        </div>   
        <div className="form-group">
          <label className="col-sm-3 control-label">Client Id</label>
          <div className="col-sm-9">
		  <input type="text" className="form-control" placeholder="Client ID" name="client_id" id={client_id} data-id={idx} required />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">Client Secret</label>
          <div className="col-sm-9">
		  <input
            type="text" className="form-control" placeholder="Client Secret"  name="client_secret" id={client_secret} data-id={idx} required />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">Access Token</label>
          <div className="col-sm-9">
		  <input
            type="text"
            className="form-control" placeholder="Access Token" name="access_token" id={access_token} data-id={idx} required />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">Comment</label>
          <div className="col-sm-9">
		  <textarea className="form-control" name="comment" id={comment}
            data-id={idx} rows="3" placeholder="Comment..."></textarea>        
        </div>
        </div>
        <div className="form-group p-4">
			<div className="col-sm-3"></div>
			<div className="col-sm-9">
      </div>       
        </div>
      </div>
    );
  });
};
