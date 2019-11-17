import React, {Component} from 'react';
import ReactDOM from 'react-dom';

export default class DashboarBloques extends Component{

    constructor(props){
        super(props);
        this.state={
            totalClientes:'',

            error:null
        }
    }

    async componentDidMount(){
        try {
            let rest = await fetch('http://127.0.0.1:8000/SystemDataRoute/data/queue')
            let data= await rest.json()
            this.setState({
                totalClientes:data.length
            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }

    render(){
        return(
        <div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Total Users</span>
              <div className={this.state.totalClientes > 0 ? 'green count' : 'text-danger count' }>{this.state.totalClientes}</div>
              <span className="count_bottom"><i className="green">4% </i> From last Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-clock-o"></i> Average Time</span>
              <div className="count">123.50</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Total Males</span>
              <div className="count green">1,212</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Total Females</span>
              <div className="count">4,567</div>
              <span className="count_bottom"><i className="red"><i className="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Total Collections</span>
              <div className="count">2,315</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div className="col-md-2 col-sm-4  tile_stats_count">
              <span className="count_top"><i className="fa fa-user"></i> Total Connections</span>
              <div className="count">7,325</div>
              <span className="count_bottom"><i className="green"><i className="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>
        );
    }

   
}
if (document.getElementById('infobasica')) {
    ReactDOM.render(<DashboarBloques />, document.getElementById('infobasica'));
}