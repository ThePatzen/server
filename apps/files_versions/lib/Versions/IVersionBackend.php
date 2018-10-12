<?php
declare(strict_types=1);
/**
 * @copyright Copyright (c) 2018 Robin Appelman <robin@icewind.nl>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Files_Versions\Versions;

use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\Files\SimpleFS\ISimpleFile;
use OCP\IUser;

/**
 * @since 15.0.0
 */
interface IVersionBackend {
	/**
	 * Get all versions for a file
	 *
	 * @param IUser $user
	 * @param FileInfo $file
	 * @return IVersion[]
	 * @since 15.0.0
	 */
	public function getVersionsForFile(IUser $user, FileInfo $file): array;

	/**
	 * Restore this version
	 *
	 * @param IVersion $version
	 * @since 15.0.0
	 */
	public function rollback(IVersion $version);

	/**
	 * Open the file for reading
	 *
	 * @param IVersion $version
	 * @return resource
	 * @since 15.0.0
	 */
	public function read(IVersion $version);

	/**
	 * Get the preview for a specific version of a file
	 *
	 * @param IUser $user
	 * @param FileInfo $sourcefile
	 * @param int $revision
	 * @return ISimpleFile
	 * @since 15.0.0
	 */
	public function getVersionFile(IUser $user, FileInfo $sourcefile, int $revision): File;
}
