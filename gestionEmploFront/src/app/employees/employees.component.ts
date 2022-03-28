import { Component, OnInit } from '@angular/core';
import { Employe } from '../employe';
import { DataService } from '../service/data.service';

@Component({
  selector: 'app-employees',
  templateUrl: './employees.component.html',
  styleUrls: ['./employees.component.css']
})
export class EmployeesComponent implements OnInit {
  employes:any;
  employe = new Employe();

  constructor(private dataService:DataService) { }

  ngOnInit(): void {
    this.getEmployes();
  }
  getEmployes(){
    this.dataService.getData().subscribe(data => {
      this.employes = data;
    })
  }
  insertEmploye(){
    this.dataService.InsertData(this.employe).subscribe(data => {
      this.getEmployes();
    })
  }

  deleteEmploye(id:any){
    this.dataService.deleteData(id).subscribe(data => {
      this.getEmployes();
    })
  }


}
