import { Component, ViewChild, OnInit,ViewContainerRef } from '@angular/core';

import { Router } from '@angular/router';
import { NgForOf } from '@angular/common';
import { ParticipantsService } from '../services/participants.service';
import { FormsModule } from '@angular/forms';


import * as jQuery from 'jquery';
import {AppMessageService} from "../../../app-message.service";
@Component({
  templateUrl: 'participant.component.html'
})
export class ParticipantComponent implements OnInit {
  constructor(private httpService: ParticipantsService, private router: Router, private notification: AppMessageService) {}
  cor = false;
  pesquisa:any = {
      inicio:null,
      fim:null,
      status:null
  };
  participants:object = {};
  tamanho = 0;

  ngOnInit(): void {
      this.showLoading();
      this.httpService.setAccessToken();
      this.httpService.eventEmitter
          .subscribe(() => {
              this.httpService.builder('admin/').list({}, 'participant')
                  .then((res) => {
                      this.participants = res;
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
