const { useState,useEffect } = React;
  //var createReactClass = require('create-react-class');

  var tabData = [
  { name: 'eCommerce Platform', isActive: true },
  { name: 'POS/ERP System', isActive: false }];
var Tabs = createReactClass({
  render: function() {
    return (
      <ul className="nav nav-tabs">
        {tabData.map(function(tab){
          return (
            <Tab data={tab} isActive={this.props.activeTab === tab} handleClick={this.props.changeTab.bind(this,tab)} />
          );
        }.bind(this))}      
      </ul>
    );
  }
});
var Tab =createReactClass({
  render: function() {
    return (
      <li onClick={this.props.handleClick} className={this.props.isActive ? "active" : null}>
        <a href="#">{this.props.data.name}</a>
      </li>
    );
  }
});
var Content = createReactClass({
  render: function() {
    return (
      <div>
        {this.props.activeTab.name === 'eCommerce Platform' ? 
        <section className="panel panel-success">
          <BookView/>
        </section>
        :null} 
        {this.props.activeTab.name === 'POS/ERP System' ? 
        <section className="panel panel-warning">        
          <ErpView/> 
      </section>
        :null} 
           </div>
    );
  }
});
var App = createReactClass({
  getInitialState: function() {
    return {
      activeTab: tabData[0]
    }
  }, 
  handleClick: function(tab) {
    this.setState({activeTab: tab});
  },
  render: function() {
    return (
      <div>
        <Tabs activeTab={this.state.activeTab} changeTab={this.handleClick} />
        <Content activeTab={this.state.activeTab} />
      </div>
    );
  }
});
const rootElementtab = document.getElementById('tabform')
  ReactDOM.render(<App />, rootElementtab)