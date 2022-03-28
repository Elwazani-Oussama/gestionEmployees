import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Employe } from '../employe';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private httpClient: HttpClient) { }
  getData(){
    return this.httpClient.get('http://127.0.0.1:8000/api/list-employee')
  }
  getEmployeById(id:any){
    return this.httpClient.get('http://127.0.0.1:8000/api/single-employee/'+id)
  }
  InsertData(data:Employe){
    return this.httpClient.post('http://127.0.0.1:8000/api/add-employee',data);
  }
  UpdateData(id:any,data:Employe){
    return this.httpClient.put('http://127.0.0.1:8000/api/update-employee/'+id,data)
  }
  deleteData(id:any){
    return this.httpClient.delete('http://127.0.0.1:8000/api/delete-employee/'+id)
  }
}
