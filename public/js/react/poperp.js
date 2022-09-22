const PopErp = props => {
  return props.bookDetails.map((val, idx) => {
    let password = `password-${idx}`,
      username = `username-${idx}`,
      comment = `comment-${idx}`,
      url = `url-${idx}`,
      apitype = `apitype-${idx}`,
      possystem = `possystem-${idx}`,
      systemtext=`System ${idx+1}`;
    return (
      <div className="form-row" key={val.index}>
        <h4 className="panel-heading">{systemtext}</h4>    
        {idx === 0 ? (
        <span>
        </span>
        ) : (
        <button className="btn btn-danger delete-sec" onClick={() => props.delete(val)}><i className="fa fa-close" aria-hidden="true" /></button> 

        )}
       
        <div className="form-group">
            <label className="col-sm-3 control-label">API Type</label>
            <div className="col-sm-9">
			<select className="form-control" required name="apitype" id={apitype} data-id={idx}>
      <option value="">Select API Type</option>
            <option value="Production">Production</option>
            <option value="Staging">Staging</option>
            <option value="Devlopment">Devlopment</option>
             </select>
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">POS/ERP System</label>
          <div className="col-sm-9">
		  <select className="form-control" required name="possystem" id={possystem} data-id={idx}>
      <option value="">Select POS</option>
            <option value="ap21">API21</option>
            <option value="ap22">AP22</option>
            <option value="ap23">AP23</option>
             </select>
        </div>
        </div>
         <div className="form-group">
          <label className="col-sm-3 control-label">URL</label>
          <div className="col-sm-9">
		  <input
            type="text"
            className="form-control"
            placeholder="URL"
            name="url"
            id={url}
            data-id={idx}
            required
          />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">UserName</label>
          <div className="col-sm-9">
		  <input
            type="text"
            className="form-control"
            placeholder="UserName"
            name="username"
            id={username}
            data-id={idx}
            required
          />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">Password</label>
          <div className="col-sm-9">
		  <input
            type="password"
            className="form-control"
            placeholder="Password"
            name="password"
            id={password}
            data-id={idx}
            required
          />
        </div>
        </div>
        <div className="form-group">
          <label className="col-sm-3 control-label">Comment</label>
          <div className="col-sm-9">
		  <textarea className="form-control"  id={comment}
            data-id={idx} rows="3" name="comment" placeholder="Comment..." required></textarea>
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
