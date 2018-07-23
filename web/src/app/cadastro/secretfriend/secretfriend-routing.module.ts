import { NgModule } from '@angular/core';
import { Routes,RouterModule } from '@angular/router';

import { SecretfriendComponent } from './components/secretfriend.component';
import { NewComponent } from "./components/new.component"
import { EditComponent } from "./components/edit.component";
const routes: Routes = [
  {
    path: '',
    component: SecretfriendComponent,
    data: {
      title: 'Clientes'
    },
      children: [
          {
              path: 'new',
              component: NewComponent,
              data: {
                  title: 'Novo'
              }
          },
          {
              path: 'edit/:id',
              component: EditComponent,
              data: {
                  title: 'Editar'
              }
          }
      ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SecretfriendRoutingModule {}
