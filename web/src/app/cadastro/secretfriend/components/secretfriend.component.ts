import { Component, ViewChild, OnInit,ViewContainerRef } from '@angular/core';

import { Router } from '@angular/router';
import { NgForOf } from '@angular/common';
import { SecretfriendService } from '../services/secretfriend.service';
import { FormsModule } from '@angular/forms';

import * as jQuery from 'jquery';
import {AppMessageService} from "../../../app-message.service";
@Component({
  templateUrl: 'secretfriend.component.html'
})
export class SecretfriendComponent implements OnInit {
  constructor(private httpService: SecretfriendService, private router: Router, private notification: AppMessageService) {}
  cor = false;
  pesquisa:any = {
      inicio:null,
      fim:null,
      status:null
  };

  secritfriends = {
      data:[]
  };

  tamanho = 0;

  ngOnInit(): void {
      this.showLoading();
      let cart = this.httpService.get();
      if(!cart)
      {
          this.httpService.initCart();
      }
      this.httpService.setAccessToken();
      this.httpService.eventEmitter
          .subscribe(() => {
              this.httpService.builder('admin/').list({}, 'secret/friend')
                  .then((res) => {
                      this.secritfriends = res;
                      this.tamanho = res.data.length;
                      this.hideLoading();
                  });
          });
      this.httpService.eventEmitter.emit();
  }

    edit(id)
    {
        this.cor = true;
        this.router.navigate(['/cadastro/secretfriend/edit/'+ id]);
    }

    lottery(id)
    {
        this.showLoading();
        this.httpService.builder('admin/')
            .list({},'secret/lottery/'+id)
            .then((res) => {
                this.hideLoading();
                this.notification.message('Sucesso','Sorteio realizado com sucesso','success');
            }).cath((res) => {
                this.notification.message('Erro','Ops não foi possivel realizar o sorteio, tente novamente','error');
            });
    }
    showModal()
    {
        jQuery(".modal").show().addClass('show');
    }
    hideModal()
    {
        jQuery(".modal").hide();
    }

    hideLoading(){
        jQuery("#bifrostBarSpinner").hide();
    }
    showLoading(){
        jQuery("#bifrostBarSpinner").show();
    }

    pesquisar(fields)
    {
        console.log(fields);
    }
}
