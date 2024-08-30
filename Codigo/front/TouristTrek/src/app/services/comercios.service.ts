import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IComercio } from '../interfaces/comercios';

@Injectable({
  providedIn: 'root'
})
export class ComerciosService {

  apiurl = 'http://localhost/xampp/proyectointegradorsexto/Codigo/back/controllers/comercios.controller.php?op=';

  constructor(
    private http: HttpClient
  ) { }

  todos() {
    return this.http.get(this.apiurl + 'todos');
  }

  registrar(comercio: IComercio) {
    return this.http.post(this.apiurl + 'insertar', comercio);
  }
}
