import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { NgbCalendarGregorian } from '@ng-bootstrap/ng-bootstrap';
import { IComercio } from 'src/app/interfaces/comercios';
import { ComerciosService } from 'src/app/services/comercios.service';

@Component({
  selector: 'app-comercios',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './comercios.component.html',
  styleUrl: './comercios.component.scss'
})
export class ComerciosComponent implements OnInit {

  // formRegistro: FormGroup;

  formRegistro = new FormGroup({
    nombre: new FormControl('', [Validators.required]),
    direccion: new FormControl(''),
    id_estado : new FormControl(1),
    latitud: new FormControl(0),
    longitud: new FormControl(0),
  });


  constructor(
    private comerciosService: ComerciosService
  ) { }

  ngOnInit(): void {
  }

  registrar() {
    console.log(this.formRegistro.controls['nombre'].value);
    console.log(this.formRegistro.controls['direccion'].value);
    console.log(this.formRegistro.controls['latitud'].value); 
    console.log(this.formRegistro.controls['longitud'].value);
    console.log(this.formRegistro.controls['id_estado'].value);

    console.log(this.formRegistro.value);

    let comercioForm: IComercio = {
      nombre: this.formRegistro.controls['nombre'].value,
      direccion: this.formRegistro.controls['direccion'].value,
      id_estado: this.formRegistro.controls['id_estado'].value,
      latitud: this.formRegistro.controls['latitud'].value,
      longitud: this.formRegistro.controls['longitud'].value
    }

    this.comerciosService.registrar(comercioForm).subscribe(
      data => {
        console.log('Respuesta',data);
      }
    );
  }
}
