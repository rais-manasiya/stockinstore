class ErpView extends React.Component {
  state = {
    bookDetails: [
      {
        index: Math.random(),
        password: "",
        username: "",
        url: "",
        apitype: "",
        possystem: "",
        comment:""
      }
    ]
  };
   handleChange = e => {
    if (
      ["password", "username", "username", "url", "apitype","possystem","comment"].includes(
        e.target.name
      )
    ) {
      let bookDetails = [...this.state.bookDetails];
      bookDetails[e.target.dataset.id][e.target.name] = e.target.value;
    } else {
      this.setState({ [e.target.name]: e.target.value });
    }
  };
  addNewRow = e => {
    this.setState(prevState => ({
      bookDetails: [
        ...prevState.bookDetails,
        {
          index: Math.random(),
          password: "",
          username: "",
          url: "",
          apitype: "",
          possystem: "",
          comment:""
        }
      ]
    }));
  };

  deteteRow = index => {
    this.setState({
      bookDetails: this.state.bookDetails.filter(
        (s, sindex) => index !== sindex
      )
    });
  };

  clickOnDelete(record) {
    this.setState({
      bookDetails: this.state.bookDetails.filter(r => r !== record)
    });
  }
  handleReset = () => {
    Array.from(document.querySelectorAll("input.form-control")).forEach(
      input => (input.value = "")
    );
     Array.from(document.querySelectorAll("textarea.form-control")).forEach(
      input => (input.value = "")
    );
  }
  handleSubmit = (e)=>{
    e.preventDefault();
     axios.post('/poserp', this.state.bookDetails)
      .then(response => {this.setState({message: response.data.message});
   Array.from(document.querySelectorAll("input.form-control")).forEach(
  input => (input.value = "")
);
 Array.from(document.querySelectorAll("textarea.form-control")).forEach(
  input => (input.value = "")
);
  })
      .catch(error => {
          this.setState({ errorMessage: error.message });
          console.error('There was an error!', error);
      });


   
}
  render() {
    let { bookDetails } = this.state;
    return (
      <div className="content formsec">
        <form className="form-horizontal" onSubmit={this.handleSubmit} onChange={this.handleChange}>
          <div className="" style={{ marginTop: 20 }}>
          <h2>{this.state.message} </h2>
            <div className="">
              <div className="">
                <div className="">
                  <PopErp
                    add={this.addNewRow}
                    delete={this.clickOnDelete.bind(this)}
                    bookDetails={bookDetails}
                  />
                  	<button
					  onClick={this.addNewRow}
					  type="button" className="btn btn-primary text-center">
					  add POS/ERP System
					</button>
                </div>
                
                <div className="buttomsubmit">
                <div className="buttomcancel">
                <input type="button" className="buttomcancel btn"  onClick={this.handleReset} value="Cancel" />
                 </div>  
                  <div className="buttonsubmit">
                <input type="submit" className="buttomcancel btn" value="Submit" />
                </div>                
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    );
  }
}
