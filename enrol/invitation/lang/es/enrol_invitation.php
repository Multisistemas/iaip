<?php
// This file is part of the UCLA Site Invitation Plugin for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'enrol_invitation'
 *
 * @package    enrol_invitation
 * @copyright  2013 UC Regents
 * @copyright  2011 Jerome Mouneyrac {@link http://www.moodleitandme.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Global strings.
$string['pluginname'] = 'Invitación';
$string['pluginname_desc'] = 'Este módulo permite enviar invitaciones por correo electrónico. Dichas invitaciones pueden ser utilizadas solo una vez. Los usuarios que hagan click al enlace enviado por correo serán automáticamente matriculados.';

// Email message strings.
$string['reminder'] = 'Recordatorio: ';

$string['emailmsgtxt'] =
    '<p><h3>INSTRUCCIONES:</h3></p>' . "\n" .
    '<p><hr \><br>' . "\n" .
    'Usted tiene una invitación para acceder al portal: {$a->fullname}. Necesitará <br>' .
    'iniciar sesión para confirmar su acceso al sitio. Tenga en cuenta que <br>' .
    'haciendo click en el enlace de acceso de este correo electrónico <br>' .
    'está aceptando lo siguiente:<br>' . "\n" .
    '<ul><li>Que Usted es la persona a la cual este correo fue dirigido y para ' .
    'quien esta invitación está destinada.</li>' . "\n" .
    '<li>El enlace a continuación expirará el ({$a->expiration}).</li></ul><p>' . "\n\n" .
    '<p><h3>ENLACE DE ACCESO:</h3></p>' . "\n" .
    '<p><hr \><br>' . "\n" .
    '{$a->inviteurl}<br><br>' . "\n\n" .
    'Si cree que ha recibido este mensaje por error o necesita <br>' .
    'asistencia, por favor contacte a: {$a->supportemail}.<br></p>';

$string['instructormsg'] =
    '<p><h3>MENSAJE DEL INSTRUCTOR:</h3></p>' . "\n" .
    '<p><hr \><br>' . "\n" .
    '{$a}</p>' . "\n\n";

// Invite form strings.
$string['assignrole'] = 'Asignar rol';
$string['defaultrole'] = 'Asignación de rol por defecto';
$string['defaultrole_desc'] = 'Seleccionar el rol que deberá ser asignado a los usuarios al procesar la invitación';
$string['default_subject'] = 'Invitación para {$a}';
$string['editenrollment'] = 'Modificar matriculación';
$string['header_email'] = 'A guien(es) desea invitar?';
$string['emailaddressnumber'] = 'Dirección de correo electrónico';

$string['notifymsg'] = '<p>Hola,</p> 
						<p>Deseamos informar que el usuario $a->username, con el correo electrónico $a->email ha logrado acceder a su curso, $a->course</p>';


$string['emailtitleuserenrolled'] = '{$a->userfullname} ha aceptado la invitación a {$a->coursefullname}.';
$string['emailmessageuserenrolled'] = '<p>Hola,</p>
									   <p>{$a->userfullname} ({$a->useremail}) ha aceptado su invitación para acceder a {$a->coursefullname} como un "{$a->rolename}". Puede verificar el estado de esta invitación en:</p>
<ul>
    <li>Listado de participantes: {$a->courseenrolledusersurl}</li>
    <li>Historial de invitaciones: {$a->invitehistoryurl}</li>
</ul>
</p>
    {$a->sitename}
    <hr \>
    {$a->supportemail}';

$string['enrolenddate'] = 'Fecha de vencimiento de la invitación';
$string['enrolenddate_help'] = 'Si habilitada, será la fecha en la que la persona invitada ya no podrá acceder al sitio.';
$string['enrolenddaterror'] = 'La feha de vencimiento no puede ser antes de hoy';
$string['enrolperiod'] = 'duración de la matriculación';
$string['enrolperiod_desc'] = 'Periodo de tiempo (en segundos) durante el cual la matriculación es válida. Si es cero, la duración de la matriculación será ilimitada.';
$string['enrolperiod_help'] = 'Periodo de tiempo durante el cual la matriculación es válida, iniciando en el momento que el usuario es matriculado. Si se deshabilita, la duración de la matriculación será ilimitada.';
$string['enrolstartdate'] = 'Fecha de inicio';
$string['enrolstartdate_help'] = 'Si habilitada, los usuario podrán ser matriculados solo a partir de esta fecha.';
$string['editenrolment'] = 'Modificar matriculación';
$string['inviteexpiration'] = 'Expiración de invitación';
$string['inviteexpiration_desc'] = 'Periodo de tiempo (en segundos) para el que una invitación es válida. El valor por defecto es 2 semanas';

$string['show_from_email'] = 'Permitir al usuario invitado contactarme a {$a->email} (su dirección estará en el campo "DE" del correo electrónico enviado. Si no se selecciona, el campo "DE" será {$a->supportemail})';
$string['inviteusers'] = 'Invitar usuario';
$string['maxinviteerror'] = 'Debe ser un número.';
$string['maxinviteperday'] = 'Cantidad máxima de invitaciones por día';
$string['maxinviteperday_help'] = 'Cantidad máxima de invitaciones que puede ser enviadas en un día para un curso.';
$string['message'] = 'Mensaje';

$string['message_help_link'] = 'ver que instrucciones se enviaron a los invitados';
$string['message_help'] =
    '<p><h3>INSTRUCCIONES:</h3>'.
    '<hr />'.
    'Usted tiene una invitación para acceder al portal: [site name]. Necesitará <br />' .
    'iniciar sesión para confirmar su acceso al sitio. Tenga en cuenta que <br>' .
    'haciendo click en el enlace de acceso de este correo electrónico <br>' .
    'está aceptando lo siguiente:<br>' . "\n" .
    '<ul><li>Que Usted es la persona a la cual este correo fue dirigido y para ' .
    '   esta invitación está destinada</li>' . "\n" .
    '<li>El enlace a continuación expirará el [expiration].</li></ul' . "\n\n" .
    '<h3>ENLACE DE ACCESO:</h3>' . "\n" .
    '<hr />'.
    '[invite url]<br />'.
    '<hr />'.
    'Si cree que ha recibido este mensaje por error o necesita <br>' .
    'asistencia, por favor contacte a: [support email].';

$string['noinvitationinstanceset'] = 'No se ha encontrado ninguna instancia de la matriculación invitaciones. Por favor primero agregue una instancia de la matriculación invitariones a su curso.';
$string['nopermissiontosendinvitation'] = 'No tiene permisos para enviar invitaciones';
$string['norole'] = 'Seleccione un rol.';
$string['notify_inviter'] = 'Notificarme a {$a->email} cuando los usuarios acepten esta invitación';
$string['header_role'] = '¿Qué rol quiere asignar a los invitados?';
$string['email_clarification'] = 'Puede ingresar múltiples correos separados por punto y coma, comas, espacios o nuevas líneas';
$string['subject'] = 'Asunto';
$string['status'] = 'Permitir invitaciones';
$string['status_desc'] = 'Permitir a usuarios invitar a otras personas a matricularse en un curso.';
$string['unenrol'] = 'Desmatricular usuario';
$string['unenroluser'] = '¿Realmente quiere desmatricular a "{$a->user}" del curso "{$a->course}"?';
$string['unenrolselfconfirm'] = '¿Realmente quiere desmatricularse del curso "{$a}"?';

// After invite sent strings.
$string['invitationsuccess'] = 'Invitación enviada exitosamente';
$string['revoke_invite_sucess'] = 'Invitación revocada exitosamente';
$string['extend_invite_sucess'] = 'Invitación extendida exitosamente';
$string['resend_invite_sucess'] = 'Invitación reenviada exitosamente';
$string['returntocourse'] = 'Regresar al curso';
$string['returntoinvite'] = 'Enviar otra invitación';

// Processing invitation acceptance strings.
$string['invitation_acceptance_title'] = 'Aceptación de invitación';
$string['expiredtoken'] = 'Este código de invitación ha expirado o ya ha sido usado.';
$string['loggedinnot'] = '<p>Esta invitación para acceder al curso "{$a->coursefullname}" como
    un "{$a->rolename}" está dirigida a {$a->email}. Si Usted no es el
    destinatario, por favor no acepte esta invitación.</p>
    <p>
        Antes de aceptar esta invitación, debe iniciar sesión.
    </p>';
$string['invitationacceptance'] = '<p>Esta invitación para acceder al curso
    "{$a->coursefullname}" como un "{$a->rolename}" está dirigida a {$a->email}.
    Si Usted no es el destinatario, por favor no acepte esta invitación.</p>';
$string['invitationacceptancebutton'] = 'Aceptar invitación';

// Invite history strings.
$string['invitehistory'] = 'Historial de invitaciones';
$string['noinvitehistory'] = 'Aun no se envían invitaciones';
$string['historyinvitee'] = 'Invitado';
$string['historyrole'] = 'Rol';
$string['historystatus'] = 'Estadp';
$string['historydatesent'] = 'Fecha de envio';
$string['historydateexpiration'] = 'Fecha de expiración';
$string['historyactions'] = 'Acciones';
$string['historyundefinedrole'] = 'Se encuentra el rol. Por favor reenvie la invitación y seleccione otro rol.';
$string['historyexpires_in'] = 'expira en';
$string['used_by'] = ' por {$a->username} ({$a->roles}, {$a->useremail}) el {$a->timeused}';

// Invite status strings.
$string['status_invite_invalid'] = 'Invalida';
$string['status_invite_expired'] = 'Expirada';
$string['status_invite_used'] = 'Aceptada';
$string['status_invite_used_noaccess'] = '(ya no tiene acceso)';
$string['status_invite_used_expiration'] = '(acceso termina el {$a})';
$string['status_invite_revoked'] = 'Revocada';
$string['status_invite_resent'] = 'Reenviada';
$string['status_invite_active'] = 'Activa';

// Invite action strings.
$string['action_revoke_invite'] = 'Revocar invitación';
$string['action_extend_invite'] = 'Extender invitación';
$string['action_resend_invite'] = 'Reenviar invitación';

// Capabilities strings.
$string['invitation:config'] = 'Configurar instancias de invitación';
$string['invitation:enrol'] = 'Invitar usuarios';
$string['invitation:manage'] = 'Administrar asignaciones de invitación';
$string['invitation:unenrol'] = 'Desasignar usuarios del curso';
$string['invitation:unenrolself'] = 'Deasignarme del curso';

// Strings for datetimehelpers.
$string['less_than_x_seconds'] = 'menos de {$a} segundos';
$string['half_minute'] = 'medio minuto';
$string['less_minute'] = 'menos de un minuto';
$string['a_minute'] = '1 minuto';
$string['x_minutes'] = '{$a} minutos';
$string['about_hour'] = 'hace 1 hora';
$string['about_x_hours'] = 'hace {$a} horas';
$string['a_day'] = '1 día';
$string['x_days'] = '{$a} días';