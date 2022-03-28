import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Employe } from '../employe';
import { DataService } from '../service/data.service';

@Component({
  selector: 'app-update-employee',
  templateUrl: './update-employee.component.html',
  styleUrls: ['./update-employee.component.css']
})
export class UpdateEmployeeComponent implements OnInit {
  id:any;
  data:any;
  employe = new Employe();


  constructor(private route:ActivatedRoute, private dataService:DataService) { }

  ngOnInit(): void {
    this.id = this.route.snapshot.params['id'];
    this.getEmploye();
  }
  getEmploye(){
    this.dataService.getEmployeById(this.id).subscribe(
      data => {
      this.data = data;
      this.employe = this.data;
    })
  }
  updateEmploye(){
    this.dataService.UpdateData(this.id,this.employe).subscribe(
      data => {
        console.log(data);
    })
  }

}
